import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, map, Observable } from 'rxjs';
import { Recommendations } from './recommendations';

@Injectable({
  providedIn: 'root'
})
export class RecommendationsService {

  private urlBase: string = 'http://localhost:8000/api/recommendations';
  private headers = new HttpHeaders()
    .set('content-type', 'application/json')
    .set('Access-Control-Allow-Origin', '*')
    .set('Access-Control-Allow-Methods', 'GET,PUT,POST,OPTIONS')
    .set('Accept', 'application/json')
    .set('X-Requested-With', 'XMLHttpRequest');
  constructor(private http: HttpClient) { }

  public getRecommendations(): Observable<Recommendations[]> {
    return this.http.get<Recommendations[]>(this.urlBase).pipe(catchError(e => { console.error(e); return []; }),
      map(result => result['data']))

  }
  public getRecommendationsByID(id: number): Observable<Recommendations> {
    const url = this.urlBase + "/" + id;

    return this.http.get<Recommendations>(url).pipe(catchError(e => {
      console.error(e);
      return [];
    }), map(result => result['data']));
  }


}
