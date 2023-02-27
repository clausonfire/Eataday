import {Component, OnInit} from '@angular/core';
import {FormControl, FormGroup, Validators} from "@angular/forms";
import {LoginService} from "../login.service";
import {Login} from "../login";
import {HttpErrorResponse} from "@angular/common/http";
import {data} from "autoprefixer";
import {ApiResponse} from "../apiResponse";
import { Router } from "@angular/router";

@Component({
  selector: 'app-loggin-form',
  templateUrl: './loggin-form.component.html',
  styleUrls: ['./loggin-form.component.scss']
})
export class LogginFormComponent implements OnInit{


  public loginForm = new FormGroup({
    id: new FormControl(),
    email: new FormControl("claudia1@gmail.com",[ //usuario@eataday.com
      Validators.required,
      Validators.email
    ]),
    password: new FormControl("password", [
      Validators.required,
      Validators.minLength(6)
    ]),
    terms: new FormControl("", [
      Validators.required,
      Validators.requiredTrue
    ])

  });


  public users: Login[];

  public constructor(
    private loginService: LoginService,
    private route: Router

  ) { }


  ngOnInit(): void {

  }


  public checkUserLogin() {
    this.loginService.checkUser(this.loginForm.value as Login).subscribe((userData) => {

    // SI SUCCESS OKEY, QUE ME GUARDE EL TOKEN, SI NO, ERROR DE CREDENCIALES ERRONEAS
    // token local storage
      let dataToken :ApiResponse = userData;
      if(userData.success) {
        console.log(userData.success)
        console.log("MANDAR AL LA SIGUIENTE PÁGINA")
        console.log(userData.data);

        localStorage.setItem("token", userData.data);
        this.route.navigate(['dashboard']) // Aquí irá la ruta a la que se enviará.



      } else if(HttpErrorResponse){
        console.log("asdsa");
        this.route.navigate(['dashboard']) // Aquí irá la ruta a la que se enviará.
      }


    })

  }

  /*public getUsers(): void  {
    this.loginService.getUsers().subscribe((user) => {
      //Esto me saca todos los usuarios registrados en la base de datos
      console.log(user);
      return this.users = user
    })
    /!*if (this.loginForm.valid) {
      alert("Usuario con nombre: " + this.loginForm.value + "logeado correctamente");
      /!*console.log(this.loginForm.value);*!/






      this.loginForm.reset();
      return;
    }*!/
  }*/




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
