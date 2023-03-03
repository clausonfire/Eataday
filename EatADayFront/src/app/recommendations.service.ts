import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, map, Observable } from 'rxjs';
import { Recommendations } from './recommendations';

@Injectable({
  providedIn: 'root'
})
export class RecommendationsService {

  private urlGetRecomms :string= "http://localhost:8000/api/recommendations";


  constructor(private http: HttpClient) { }

  public getRecomm(): Observable<Recommendations[]> {
    return this.http.get<Recommendations[]>(this.urlGetRecomms).pipe(
      catchError(e => {
        console.error(e);
        return [];
      })
    ,map(result=>result['data']))

  }


}