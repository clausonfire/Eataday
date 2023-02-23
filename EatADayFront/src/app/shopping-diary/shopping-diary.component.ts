import { Component, OnInit } from '@angular/core';
import { Supermarket } from '../supermarket';
import { SupermarketService } from '../supermarket.service';

@Component({
  selector: 'app-shopping-diary',
  templateUrl: './shopping-diary.component.html',
  styleUrls: ['./shopping-diary.component.scss']
})
export class ShoppingDiaryComponent implements OnInit {
  public supermarkets?: Supermarket[];
  constructor(private supermarketService: SupermarketService
  ) {

  }
  ngOnInit(): void {


    this.supermarketService.getSupermarkets().subscribe((supermarkets: Supermarket[]) => {
      this.supermarkets = supermarkets;

    });


  }
}
