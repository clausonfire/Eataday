import { Component } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ShoppingListService } from '../shopping-list.service';
import { ShoppingList } from '../shoppingList';
import { Supermarket } from '../supermarket';
import { SupermarketService } from '../supermarket.service';

@Component({
  selector: 'app-supermarket-detail',
  templateUrl: './supermarket-detail.component.html',
  styleUrls: ['./supermarket-detail.component.scss']
})
export class SupermarketDetailComponent {
  public supermarket?: Supermarket;
  public userShoppingList?: ShoppingList;
  public id: number = 3;
  constructor(private route: ActivatedRoute, private supermarketService: SupermarketService, private shoppingListService: ShoppingListService
  ) {

  }
  ngOnInit(): void {
    let id: number = +this.route.snapshot.paramMap.get('id');
    this.supermarketService.getSupermarketByID(id).subscribe((supermarket: Supermarket) => {
      this.supermarket = supermarket;
    });
    this.shoppingListService.getUserShoppingList(this.id).subscribe((shopList: ShoppingList) => {
      this.userShoppingList = shopList;
      this.userShoppingList.ingredients = JSON.parse(this.userShoppingList.ingredients)
    });
  }
}
