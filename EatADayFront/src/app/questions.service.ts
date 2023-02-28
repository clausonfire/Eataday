import { Injectable } from '@angular/core';
import {HttpClient, HttpErrorResponse} from "@angular/common/http";
import {catchError, map, Observable, of} from "rxjs";
import {Login} from "./login";
import { ApiResponse } from './apiResponse';
import {data} from "autoprefixer";
import { Questions } from './questions';

@Injectable({
  providedIn: 'root'
})
export class questionService {

  private urlGetQuestions= "http://localhost:8000/api/comments";


  constructor(private http: HttpClient) { }

  public getComents(): Observable<Questions[]> {
    return this.http.get<Questions[]>(this.urlGetQuestions).pipe(
      catchError(e => {
        console.error(e);
        return [];
      })
    ).pipe(map(result=>result['data']))

  }

  // public getCommentsText(id: number): Observable<Questions[]>{
  //   return this.http.get<Questions>(this.urlGetQuestions + '/' + id ).pipe(map((result: Questions[]) => result))
  // }

  // getHeroesById(id: number): Observable<Questions[]> {
  //   return this.http
  //     .get<Questions>(this.urlGetQuestions + '/' + id )
  //     .pipe(map((result: Questions) => result.ids));
  // }

  public getQuestionByID(id: number): Observable<Questions> {
    const url = this.urlGetQuestions + "/" + id;

    return this.http.get<Questions>(url).pipe(catchError(e => {
      console.error(e);
      return [];
    }), map(result => result['data']));
  }
}
