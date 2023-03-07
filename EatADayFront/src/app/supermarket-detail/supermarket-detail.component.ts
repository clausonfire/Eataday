import { Component } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ShoppingListService } from '../shopping-list.service';
import { ShoppingList } from '../shoppingList';
import { Supermarket } from '../supermarket';
import { SupermarketService } from '../supermarket.service';
import { ApiResponse } from '../apiResponse';
import { map, switchMap } from 'rxjs';
import { shopListResponse, UserShopListResponse } from '../shopListResponse';
import { Ingredients } from '../ingredients';
import { FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-supermarket-detail',
  templateUrl: './supermarket-detail.component.html',
  styleUrls: ['./supermarket-detail.component.scss']
})
export class SupermarketDetailComponent {
  public supermarket?: Supermarket;
  public userShoppingList?: Ingredients[];
  public userBoughtShoppingList?: Ingredients[];
  public id: number = 2;
  public response: ApiResponse;
  public editModal: boolean = false;
  public ingredientToEdit: Ingredients;
  constructor(private route: ActivatedRoute, private supermarketService: SupermarketService, private shoppingListService: ShoppingListService
  ) {

  }
  public loginForm = new FormGroup({
    id: new FormControl(),
    name: new FormControl("Introduce un nuevo nombre...", [ //usuario@eataday.com
      Validators.minLength(3),
      Validators.nullValidator
    ]),
    // password: new FormControl("password", [
    //   Validators.required,
    //   Validators.minLength(6)
    // ]),
    // terms: new FormControl("", [
    //   Validators.required,
    //   Validators.requiredTrue
    // ])

  });
  ngOnInit(): void {
    let id: number = +this.route.snapshot.paramMap.get('id');
    this.supermarketService.getSupermarketByID(id).subscribe((supermarket: Supermarket) => {
      this.supermarket = supermarket;
      this.shoppingListService.getSuperMarketUserShoppingList(this.id, supermarket.id).pipe(map(result => result)).subscribe((shopList: shopListResponse) => {
        // console.log(shopList);
        this.userShoppingList = shopList.data[0].ingredients.filter((ingredient) => !ingredient.isBought);
        this.userBoughtShoppingList = shopList.data[0].ingredients.filter((ingredient) => ingredient.isBought);
        console.log(shopList.data[0]);

      });


    })
  }
  public delete(ingredient: Ingredients) {
    console.log(ingredient)
    this.shoppingListService.deleteIngredientFromSupermarketList(this.id, this.supermarket, ingredient).pipe(
      switchMap(() => this.shoppingListService.getSuperMarketUserShoppingList(this.id, this.supermarket.id))).subscribe((shopList: shopListResponse) => {
        // console.log(shopList);
        this.userShoppingList = shopList.data[0].ingredients.filter((ingredient) => !ingredient.isBought);
        this.userBoughtShoppingList = shopList.data[0].ingredients.filter((ingredient) => ingredient.isBought);
        console.log(shopList.data[0]);

      });
  }

  public setBoughtTrue(ingredient: Ingredients) {
    this.shoppingListService.setBoughtBoolean(this.id, this.supermarket, ingredient)
      .pipe(switchMap(() =>
        this.shoppingListService.getSuperMarketUserShoppingList(this.id, this.supermarket.id)))
      .subscribe((shopList: shopListResponse) => {
        this.userShoppingList = shopList.data[0].ingredients.filter((ingredient) => !ingredient.isBought);
        this.userBoughtShoppingList = shopList.data[0].ingredients.filter((ingredient) => ingredient.isBought);
        console.log(shopList.data[0]);

      })
  }
  public show() {
    console.log(this.userShoppingList);
  }
  public recharge(){
    this.shoppingListService.getSuperMarketUserShoppingList(this.id, this.supermarket.id).pipe(map(result => result)).subscribe((shopList: shopListResponse) => {
      // console.log(shopList);
      this.userShoppingList = shopList.data[0].ingredients.filter((ingredient) => !ingredient.isBought);
      this.userBoughtShoppingList = shopList.data[0].ingredients.filter((ingredient) => ingredient.isBought);
      console.log(shopList.data[0]);

    });
    this.editModal = false;
  }

  public openEditModal(ingredient: Ingredients) {
    this.editModal = true;
    this.ingredientToEdit = ingredient;
  }
}
