import { Component } from '@angular/core';
import {Router} from "@angular/router";

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent {


  constructor(
    private router: Router
  ) { }
  public logOut(): void {
    if (localStorage.getItem('token')) {
      localStorage.removeItem("token");
      this.router.navigate(['login']);
      return console.log("token borrado");
    }
    return console.log("error, NO se ha podido borrar el token");

  }

}
