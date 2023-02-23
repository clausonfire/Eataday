import { Injectable } from '@angular/core';
import {HttpClient, HttpErrorResponse} from "@angular/common/http";
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

  constructor(private http: HttpClient) { }


  public getUsers(): Observable<Login[]> {
    return this.http.get<Login>(this.urlGetUsers).pipe(
      catchError(e => {
        console.error(e);
        return [];// le pasamos un array vacío para que no devuelva nada
      })
    ).pipe(map((result: Login[])=>result))
  }

  public checkUser(log: Login): Observable<ApiResponse> {
    const postData = new FormData();
    postData.append('name', log.name);
    postData.append('email', log.email);
    postData.append('password', log.password);

/*
    localStorage.setItem('userData', JSON.stringify(log));
*/
    return this.http.post<ApiResponse>(this.urlCheckLogin, postData).pipe(
      catchError((error: HttpErrorResponse) => {
        console.error(error);
        const errorMessage = error.error.message || 'Unknown error';
        return of({ success: false, message: errorMessage, data: null });
      })
    ).pipe(map((result: ApiResponse)=>result))
  }

















  /*public getAllUsers(): Observable<Login[]> {
      return this.http.get<Login[]>(this.URL).pipe(
        catchError(e => {
          console.error(e);
          return [];// le pasamos un array vacío para que no devuelva nada
        })
      ).pipe(map((result: Login)=>result.result))
    }*/


  /*addUser(nombre: string, email: string, password: string): Observable<Login[]> {
    const newUser = new FormData();
    newUser.append("nombre", nombre);
    newUser.append("email", email);
    newUser.append("password", password);
    return this.http.post(this.URL, newUser);
  }*/





}
