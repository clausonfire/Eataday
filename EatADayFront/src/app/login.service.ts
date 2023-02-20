import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {catchError, map, Observable} from "rxjs";
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
      catchError(e => {
        console.error(e);
        return [];// le pasamos un array vacío para que no devuelva nada
      })
    ).pipe(map((result: ApiResponse)=>result))
  }



  /*login(user: User): Observable<User> {
    const postData = new FormData();
    postData.append('name', user.name);
    postData.append('password', user.password);

    return this.http.post<User>(this.usersUrl, postData).pipe(
      tap( _ => this.log('fetched user')),
      catchError(this.handleError<User>(`getUser`))
    );*/














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
