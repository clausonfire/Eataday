import { HttpClient, HttpErrorResponse, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, map, Observable, of } from 'rxjs';
import { ApiResponse } from './apiResponse';
import { SugerenceRecipes } from './sugerencerecipe';

@Injectable({
  providedIn: 'root'
})
export class SugerenceRecipeService {
  private urlBase: string = 'http://localhost:8000/api/sugerenceRecipes';
  private headers = new HttpHeaders()
    .set('content-type', 'application/json')
    .set('Access-Control-Allow-Origin', '*')
    .set('Access-Control-Allow-Methods', 'GET,PUT,POST,OPTIONS')
    .set('Accept', 'application/json')
    .set('X-Requested-With', 'XMLHttpRequest');

  constructor(private http: HttpClient) { }



  public getRecipes(): Observable<SugerenceRecipes[]> {
    return this.http.get<SugerenceRecipes[]>(this.urlBase).pipe(catchError(e => { console.error(e); return []; }),
      map(result => result['data']))

  }
  public getRecipesByID(id: number): Observable<SugerenceRecipes> {
    const url = this.urlBase + "/" + id;

    return this.http.get<SugerenceRecipes>(url).pipe(catchError(e => {
      console.error(e);
      return [];
    }), map(result => result['data']));
  }
  public searchRecipes(ingredients: string[]): Observable<SugerenceRecipes[]> {

    let url = this.urlBase + "/search";
    console.log(ingredients);
    console.log('hola');

    if (ingredients.length === 0) {
      return of([]);
    }

    console.log(ingredients);
    return this.http.post<SugerenceRecipes[]>(url, ingredients, { "headers": this.headers }).pipe(catchError(e => {
      console.error(e);
      return [];
    }), map(result => result['data']))

  }







  public checkRecipes(log: SugerenceRecipes): Observable<ApiResponse> {
    return this.http.post<ApiResponse>(this.urlBase, log).pipe(
      catchError((error: HttpErrorResponse) => {
        console.error(error);
        const errorMessage = error.error.message || 'Unknown error';
        return of({ success: false, message: errorMessage, data: null });
      })
    ).pipe(map((result: ApiResponse)=>result))

  }
}
