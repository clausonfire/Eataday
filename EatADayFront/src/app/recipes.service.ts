import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, map, Observable } from 'rxjs';
import { Recipes } from './recipes';

@Injectable({
  providedIn: 'root'
})
export class RecipesService {
  private urlBase: string = 'http://localhost:8000/api/recipes';
  constructor(private http: HttpClient) { }

  public getRecipes(): Observable<Recipes[]> {
    return this.http.get<Recipes[]>(this.urlBase).pipe(catchError(e => { console.error(e); return []; }),
      map(result => result['data']))

  }

}
