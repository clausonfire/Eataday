import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, map, Observable } from 'rxjs';
import { Ingredients } from './ingredients';

@Injectable({
  providedIn: 'root'
})
export class IngredientsService {

  private urlBase: string = 'http://localhost:8000/api/ingredients';
  constructor(private http: HttpClient) { }
  // public searchIngredients(text: string): Observable<Ingredients[]> {


  //   if (!text.trim()) {
  //     return of([]);
  //   }

  //   return this.http.get<Hero[]>(url).pipe(catchError(e => {
  //     console.error(e);
  //     return [];
  //   }), map(result => result['data']['results']))

  // }

  public getIngredients(): Observable<Ingredients[]> {


    return this.http.get<Ingredients[]>(this.urlBase).pipe(catchError(e => { console.error(e); return []; }),
       map(result => result['data']))

//


  }
}
