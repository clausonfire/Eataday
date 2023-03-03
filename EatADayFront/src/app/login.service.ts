import { Injectable } from '@angular/core';
import {HttpClient, HttpErrorResponse, HttpHeaders} from "@angular/common/http";
import {catchError, map, Observable, of} from "rxjs";
import {Login} from "./login";
import { ApiResponse } from './apiResponse';
import {data} from "autoprefixer";
import {User} from "./user";
import {Router} from "@angular/router";

@Injectable({
  providedIn: 'root'
})
export class LoginService {

  private urlCheckLogin = "http://localhost:8000/api/login";
  private getUserLogged = "http://localhost:8000/api/soyyo";
  constructor(
    private http: HttpClient,
    private router: Router,
  ) { }


  public login(log: Login): Observable<boolean> {
    const postData = new FormData();
    postData.append('email', log.email);
    postData.append('password', log.password);

    return this.http.post<ApiResponse>(this.urlCheckLogin, postData).pipe(
      catchError((error: HttpErrorResponse) => {
        const errorMessage = error.error.message || 'Unknown error';
        return of({ success: false, message: errorMessage, data: null });
      })
    ).pipe(map((token) => {
        if(token.success) {
          /*console.log(token);*/
          localStorage.setItem("token", token.data);
          if (localStorage.getItem('token')) {
            this.router.navigate(['matchAlimentos']);
          }
          return true
      }
        return  false;
    }))
  }



  public getTokenUserLoged(): Observable<ApiResponse> {
    let token: string = localStorage.getItem('token');
    return this.http.get<ApiResponse>(this.getUserLogged, {headers: {"Accept": "application/json", "Authorization": `Bearer ${token}`}}).pipe(
      catchError(e => {
        console.error(e);
        return [];
      })
    ).pipe(map((result: ApiResponse)=>result))
  }
  

}
