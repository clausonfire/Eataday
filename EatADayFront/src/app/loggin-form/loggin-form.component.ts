import {Component, OnInit} from '@angular/core';
import {FormControl, FormGroup, Validators} from "@angular/forms";
import {LoginService} from "../login.service";
import {Login} from "../login";
import {HttpErrorResponse} from "@angular/common/http";
import {data} from "autoprefixer";

@Component({
  selector: 'app-loggin-form',
  templateUrl: './loggin-form.component.html',
  styleUrls: ['./loggin-form.component.scss']
})
export class LogginFormComponent {

  public loginForm = new FormGroup({
    id: new FormControl(),
    name: new FormControl('Usuario', [
      Validators.maxLength(16),
      Validators.required
    ]),
    email: new FormControl("claudia1@gmail.com",[ //usuario@eataday.com
      Validators.required,
      Validators.email
    ]),
    /*emailRepite: new FormControl("usuario@eataday.com",[
      Validators.required,
      Validators.email
    ]),*/
    password: new FormControl("password", [
      Validators.required,
      Validators.minLength(6)
    ]),
    /*passwordRepite: new FormControl("password", [
      Validators.required,
      Validators.minLength(6)
    ]),*/
    terms: new FormControl("", [
      Validators.required,
      Validators.requiredTrue
    ])

  });
  public users: Login[];

  public constructor(
    private loginService: LoginService
  ) { }


 /* ngOnInit(): void {

  }*/


  public checkUser() {
    this.loginService.checkUser(this.loginForm.value as Login).subscribe((userData) => {


      console.log(userData.success);


      if (!userData.success === true) {
        alert("okey");
      }
      /*if() {
        alert("No has podido loggearte, REDIRIENDO A LA RUTA LOGGIN");
      }*/
      return userData;
    })

  }

  public getUsers(): void  {
    this.loginService.getUsers().subscribe((user) => {
      //Esto me saca todos los usuarios registrados en la base de datos
      console.log(user);
      return this.users = user
    })
    if (this.loginForm.valid) {
      //alert("Usuario con nombre: " + this.loginForm.value.name + "logeado correctamente");
      console.log(this.loginForm.value);
      this.loginForm.reset();
      return;
    }
  }




  public reset(): void {
    this.loginForm.reset();
  }





}




/*
CHECKUSERS
this.loginService.checkUser().subscribe((user) => {
  //
  //Esto me saca todos los usuarios registrados en la base de datos
  console.log(user);
  return this.users = user
}*/


/*this.loginService.checkUser(this.users).subscribe((user) => {
  //Esto me saca todos los usuarios registrados en la base de datos

  return this.users;
})*/


/* public checkUsers() {
    this.loginService.checkUsers().subscribe((user) => {
      //Esto me saca todos los usuarios registrados en la base de datos
      console.log(user);
      return this.users = user
    })
  }*/




/* public sendData() {
   if (this.loginForm.invalid) {
     return alert('FORMULARIO INVALIDO');
   }
   /!*if(this.loginForm.value.email != this.loginForm.value.emailRepite) {
     return alert('THE EMAILS DONT MATCH');
   }
   if(this.loginForm.value.password != this.loginForm.value.passwordRepite) {
     return alert('THE PASSWORD DONT MATCH');
   }*!/
   if (this.loginForm.valid) {
     /!*this.loginService.saveData();*!/
     alert("Usuario con nombre: " + this.loginForm.value.name + "logeado correctamente");
     console.log(this.loginForm.value);
     return;
   }
 }*/
