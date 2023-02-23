import { Component } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Supermarket } from '../supermarket';
import { SupermarketService } from '../supermarket.service';

@Component({
  selector: 'app-supermarket-detail',
  templateUrl: './supermarket-detail.component.html',
  styleUrls: ['./supermarket-detail.component.scss']
})
export class SupermarketDetailComponent {
  public supermarket?: Supermarket;
  constructor(private route: ActivatedRoute, private supermarketService: SupermarketService,
  ) {

  }
  ngOnInit(): void {
    let id: number = +this.route.snapshot.paramMap.get('id');
    this.supermarketService.getSupermarketByID(id).subscribe((supermarket: Supermarket) => {
      this.supermarket = supermarket;
    });
  }
}
