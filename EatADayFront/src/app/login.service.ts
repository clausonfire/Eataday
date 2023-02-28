import { Injectable } from '@angular/core';
import {HttpClient, HttpErrorResponse, HttpHeaders} from "@angular/common/http";
import {catchError, map, Observable, of} from "rxjs";
import {Login} from "./login";
import { ApiResponse } from './apiResponse';
import {data} from "autoprefixer";

@Injectable({
  providedIn: 'root'
})
export class LoginService {

  private urlGetUsers = "http://localhost:8000/api/users";
  private urlCheckLogin = "http://localhost:8000/api/login";
  private getUserLogged = "http://localhost:8000/api/soyyo";
  private logOut = "http://localhost:8000/api/logout";
  private headers: HttpHeaders;
  private authToken: string;
  private token: string = localStorage.getItem('token');
  constructor(
    private http: HttpClient
  ) {
    this.headers = new HttpHeaders({"Accept": "application/json", "Authorization": `Bearer ${this.token}`});
  }


  public login(log: Login): Observable<ApiResponse> {
    const postData = new FormData();
    postData.append('email', log.email);
    postData.append('password', log.password);

    return this.http.post<ApiResponse>(this.urlCheckLogin, postData).pipe(
      catchError((error: HttpErrorResponse) => {
        console.error(error);
        const errorMessage = error.error.message || 'Unknown error';
        return of({ success: false, message: errorMessage, data: null });
      })
    ).pipe(map((result: ApiResponse)=>result))
  }



  public checkLoginService(): Observable<boolean> {
    return this.http.get<ApiResponse>(this.urlCheckLogin).pipe(
      catchError(e => {
        console.error(e);
        return [];// le pasamos un array vacío para que no devuelva nada
      })
    ).pipe(map((result: ApiResponse)=>result.success))
  }






  public getUsers(): Observable<Login[]> {
    return this.http.get<Login>(this.urlGetUsers).pipe(
      catchError(e => {
        console.error(e);
        return [];// le pasamos un array vacío para que no devuelva nada
      })
    ).pipe(map((result: Login[])=>result))
  }


  public getTokenUserLoged(): Observable<boolean> {
    return this.http.get<ApiResponse>(this.getUserLogged, {"headers": this.headers}).pipe(
      catchError(e => {
        console.error(e);
        return [];// le pasamos un array vacío para que no devuelva nada
      })
    ).pipe(map((result: ApiResponse)=>result.success))
  }





  /* Comprobacion de ruta de LogOut */
  public logOutUser(headers: HttpHeaders): Observable<ApiResponse> {
    return this.http.post<Login>(this.logOut, headers).pipe(
      catchError(e => {
        console.error(e);
        return [];// le pasamos un array vacío para que no devuelva nada
      })
    )/*.pipe(map((result: Login[])=>result))*/
  }



}
