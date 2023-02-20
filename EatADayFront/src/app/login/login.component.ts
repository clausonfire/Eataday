import { Component } from '@angular/core';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent {
public showModals:boolean=false;
public getModals(): void {
  this.showModals = !this.showModals;
}
}
