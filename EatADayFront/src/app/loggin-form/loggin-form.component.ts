import { Component } from '@angular/core';
import {FormControl, FormGroup, Validators} from "@angular/forms";

@Component({
  selector: 'app-loggin-form',
  templateUrl: './loggin-form.component.html',
  styleUrls: ['./loggin-form.component.scss']
})
export class LogginFormComponent {
  public visible: boolean = false;

  public loginForm = new FormGroup({
    id: new FormControl(),
    name: new FormControl('', [
      Validators.maxLength(16),
      Validators.required
    ]),
    /*lastName: new FormControl(""),*/
    email: new FormControl("",[
      Validators.required
    ]),
    emailRepite: new FormControl("",[
      Validators.required
    ]),
    password: new FormControl("", [
      Validators.required
    ]),
    passwordRepite: new FormControl("", [
      Validators.required,
    ]),
    /*height: new FormControl("not specified"),
    weight: new FormControl("not specified")*/
  });
  public data = this.loginForm.value;

  public reset() {
    this.loginForm.reset();
  }

  public showData() {
    if (this.loginForm.invalid) {
      alert('FORMULARIO INVALIDO');
      return;
    }


    this.visible = false;
  }

}
