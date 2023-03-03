import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, map, Observable } from 'rxjs';
import { ShoppingList } from './shoppingList';
import { Supermarket } from './supermarket';
import { ShopListPetition } from './shopListPetition';
import { InsertIngredientPetition } from './insertIngredientPetition';
import { ApiResponse } from './apiResponse';

@Injectable({
  providedIn: 'root'
})
export class ShoppingListService {
  private urlBase: string = 'http://localhost:8000/api/shoppingList';
  private urlBaseUser: string = 'http://localhost:8000/api/generalShoppingList';

  constructor(private http: HttpClient) {

  }
  // public getShoppingList(userId: number, supermarketId: number): Observable<ShoppingList> {
  //   //POST

  //   const data = {
  //     user_id: userId,
  //     supermarket_id: supermarketId,
  //   };
  //   return this.http.post<ShopListPetition>(this.urlBase, data).pipe(catchError(e => {
  //     console.error(e);
  //     return [];
  //   }), map(result => result['data']));
  // }
  public getUserShoppingList(id: number): Observable<ShoppingList> {
    return this.http.get<ShoppingList>(this.urlBaseUser + '/' + id).pipe(catchError(e => {
      console.error(e);
      return [];
    }), map(result => result['data']));

  }
  public deleteIngredientFromUserList(userId: number, ingredient: string ){
    return this.http.delete(this.urlBaseUser + "/" + userId + "/" + ingredient).pipe(catchError(e => {
      console.error(e);
      return [];
    }), map(result => result['data']));
  }
  public ingredientToSpecificList(supermarket:Supermarket, ingredient: string,id:number): Observable<ApiResponse>{
    const data = {
          supermarket: supermarket,
          ingredient: ingredient,
          user_id:id
        };
    return this.http.post<InsertIngredientPetition>(this.urlBase+"/insert", data).pipe(catchError(e => {
      console.error(e);
      return [];
    }));
  }
  public ingredientToUserList(ingredient: string,id:number): Observable<ApiResponse>{
    const data = {

          ingredient: ingredient,
          user_id:id
        };
    return this.http.post<InsertIngredientPetition>(this.urlBaseUser+"/insert", data).pipe(catchError(e => {
      console.error(e);
      return [];
    }));
  }

}
