import { Component, OnInit } from '@angular/core';
import { Supermarket } from '../supermarket';

import { SupermarketService } from '../supermarket.service';
import { ShoppingList } from '../shoppingList';
import { ShoppingListService } from '../shopping-list.service';
import { switchMap } from 'rxjs';
import { Input } from '@angular/core';
import { ApiResponse } from '../apiResponse';
import { Router } from '@angular/router';

@Component({
  selector: 'app-shopping-diary',
  templateUrl: './shopping-diary.component.html',
  styleUrls: ['./shopping-diary.component.scss']
})
export class ShoppingDiaryComponent implements OnInit {
  public supermarkets?: Supermarket[];
  public userShoppingList?: ShoppingList;
  public selectedSupermarket: Supermarket;
  // @Input() modalSupermarket: Supermarket[];

  public id: number = 3;
  public ingredientToUserList: string;
  public supermarketModal: boolean = false;
  public insertResponse: ApiResponse;
  constructor(private supermarketService: SupermarketService, private shoppingListService: ShoppingListService, private router: Router
  ) {

  }



  ngOnInit(): void {

    this.shoppingListService.getUserShoppingList(this.id).subscribe((shopList: ShoppingList) => {
      this.userShoppingList = shopList;
      this.userShoppingList.ingredients = JSON.parse(this.userShoppingList.ingredients)
    });


    this.supermarketService.getSupermarkets().subscribe((supermarkets: Supermarket[]) => {
      this.supermarkets = supermarkets;

    });


  }
  public delete(ingredient: string) {
    this.shoppingListService.deleteIngredientFromUserList(this.id, ingredient).pipe(
      switchMap(() => this.shoppingListService.getUserShoppingList(this.id))
    ).subscribe((shopList: ShoppingList) => {
      this.userShoppingList = shopList;
      this.userShoppingList.ingredients = JSON.parse(this.userShoppingList.ingredients);
    });
  }
  public openModal(ingredient: string) {
    this.supermarketModal = true;
    this.ingredientToUserList = ingredient;
  }
  public choseSupermarket(chosenSupermarket: Supermarket): void {
    this.selectedSupermarket = chosenSupermarket;
    console.log(this.selectedSupermarket);
    console.log(this.ingredientToUserList);
    this.shoppingListService.ingredientToSpecificList(this.selectedSupermarket, this.ingredientToUserList, this.id).subscribe((response: ApiResponse) => {
      console.log(response);
      if (response.success) {
        this.supermarketModal = false;
        // this.delete(this.ingredientToUserList)
      }
    });
  }
  public toUserList(ingredient: string): void {
    this.shoppingListService.ingredientToUserList(ingredient, this.id).pipe(
      switchMap(() => this.shoppingListService.getUserShoppingList(this.id))
    ).subscribe((shopList: ShoppingList) => {
      this.userShoppingList = shopList;
      this.userShoppingList.ingredients = JSON.parse(this.userShoppingList.ingredients);
    });

  }
  public toSupermarketList(ingredient: string): void {
    this.openModal(ingredient);

  }
  public goToSupermarketDetail(id: number): void {
    this.router.navigate(['supermarketDetail/'])
  }

}
