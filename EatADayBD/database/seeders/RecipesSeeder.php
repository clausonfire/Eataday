<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Recipe;


class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Recipe::create([
            'title' => 'Macarrones con tomate',
            'photo' => 'null',

            'ingredients' => "['macarrones', 'tomate', 'aceite', 'sal']",
            'displayIngredients' => "['1 rebanadad de pan1', 'Un tomate maduro3', 'Un pellizco de sal5', 'Una cabeza de ajo4']",
            'preparation' => '- Hervir la pasta al gusto.
            - Echar tomate.',
            'description'=> '-Una forma estupenda de conseguir que los niños coman verdura es mezclarla entre sus comidas favoritas.
            Si preparáis una buena salsa de tomate casera junto a la pasta estarán tomando un saludable plato que les llenará de energía.'

        ]);

        Recipe::create([
            'title' => 'Arroz y conejo',
            'photo' => 'null',


            'ingredients' => "['arroz', 'conejo', 'sal', 'agua', 'aceite', 'sal']",
            'displayIngredients' => "['1 rebanadad de pan3', 'Un tomate maduro3', 'Un pellizco de sal2', 'Una cabeza de ajo1']",
            'preparation' => '- Freir el conejo
            -añadir agua y arroz',
            'description'=> 'El arroz con conejo es un plato sabroso, nutritivo y lleno de sabor. A los niños les va a encantar
             porque su sabor es también muy suave'

        ]);

        Recipe::create([
            'title' => 'Pantumaka',
            'photo' => 'null',
            'ingredients' => "['tomate', 'pan', 'sal', 'ajo']",
            'displayIngredients' => "['1 rebanadad de pan', 'Un tomate maduro', 'Un pellizco de sal', 'Una cabeza de ajo']",
            'preparation' => '- Restregar el tomate encima del pan y a al ataque',
            'description'=> 'plato tradicional catalán habrás disfrutado del sabor que aporta el tomate frotado sobre un buen pan
            de payés, que luego se riega con aceite de oliva virgen extra y sal'
        ]);

        Recipe::create([
            'title' => 'Albondigas con tomate',
            'photo' => 'null',
            'ingredients' => "['pan rallado', 'leche entera', 'cebolla', 'ajo', 'perejil', 'aceite de oliva', 'carne picada', 'huevo', 'pimienta negra', 'sal', 'tomate', 'harina']",
            'displayIngredients' => "['50 g de miga de pan', '150ml leche', '2 cebollas', '2 dientes de ajo', '1 ramillete de perejil', '2 cucharadas de aceite', '300g de carne picada', '1 huevo', '600g tomate triturado']",
            'preparation' => '- picamos las cebollas y ajos.
            - picamos perejil, calentamos la sarten con aceite, y veretemos todo, una vez terminada lo juntamos y mesclamos todo en un bol con la carne y 1 huevo-
            - ahora echamos la salsa de tomate a la sarten.
            - ahora hacemos pelotitas con la carne y la echamos en la saten con el tomate esperamos a que se cueza y listo',
            'description'=> 'Las albóndigas se pueden preparar de muchas maneras, ya que podemos cocinarlas con diferentes salsas. Éstas que os proponemos hoy, son las clásicas albóndigas con tomate, aunque la salsa lleva
             también almendras, lo que las hace muy especiales, y seguro que os vais a chupar los dedos toda la familia.'
        ]);

        Recipe::create([
            'title' => 'Huevos rotos con jamon',
            'photo' => 'null',
            'ingredients' => "['huevo', 'patata', 'jamon serrano', 'aceite de oliva virgen']",
            'displayIngredients' => "['4 huevos', '4 patatas', '150 g de jamón serrano', 'Aceite de oliva virgen', 'sal']",
            'preparation' => '- Pelar y lavar las patatas.
            - cortarlas en rodajas finas.
            - poner el aceite en una sartén grande o cazuela y cuando esté caliente poner las patatas.
            - Sacamos las patatas y dejamos sobre papel de cocina paa que escurran bien el aceite.
            - Sobre las patatas poner el jamón, con el calor de las patatas el jamón quedará perfecto..
            - freímos los huevos al gusto, Los ponemos sobre el jamón, encima un poco de sal',
            'description'=> 'Los huevos rotos con jamón es una receta fácil de hacer con un resultado espectacular y que gusta a todos, en mi casa si fuera por ellos,  los comerían todos los días.'
        ]);

        Recipe::create([
            'title' => 'Fajitas mexicanas',
            'photo' => 'null',
            'ingredients' => "[' tortillas de trigo', 'pechugas de pollo', ' pimiento verde', 'pimiento rojo', 'pimiento amarillo', 'cebolla']",
            'displayIngredients' => "['8 tortillas de trigo', '500 g. de pechugas de pollo', '1 pimiento verde', '1 pimiento rojo', '1 pimiento amarillo', '1 cebolla grande']",
            'preparation' => '- Limpiamos muy bien el pollo.
            - Maceramos con el ajo, sal, pimienta negra y comino.
            - Cortamos los pimientos en tiras un poquito gruesas y la cebolla en juliana fina.
            - Ponemos dos cucharadas de aceite de oliva virgen extra en una sartén y cuando esté caliente añadimos la cebolla, salpimentamos y rehogamos bien.
            - Añadimos la cucharadita de pimentón dulce.
            - Pasamos el pollo a la otra sartén en la que tenemos la cebolla pochada.
            - Para finalizar ponemos al fuego una sartén pequeña con unas gotas de aceite de oliva virgen extra y calentamos las tortillas de trigo.',
            'description'=> 'Las fajitas de pollo son un plato típico de la comida mexicana o, para ser más exactos, de la cocina Tex-Mex fruto de la mezcla de la gastronomía típica mexicana
            con la estadounidense del estado de Texas. '
        ]);

        Recipe::create([
            'title' => 'Tortilla de patatas',
            'photo' => 'null',
            'ingredients' => "['patata', 'cebolla', 'huevo', 'sal', 'aceite de oliva']",
            'displayIngredients' => "['700 g de patatas', '300 g cebollas', '6 huevos', 'sal', 'aceite de oliva']",
            'preparation' => '- primero de todo caramelizamos la cebolla.
            - pelamos las patatas y las cortamos en rodajas finas.
            - añadimos las patatas y dejamos que se vayan friendo.
            - Sacamos las patatas y las escurrimos bien del aceite y las ponemos en un bol grande.
            - Batimos los huevos y los añadimos al bol, removiendo con un tenedor para que se mezclen bien los tres ingredientes.
            - Cuajamos la tortilla en una sartén con una cucharada de aceite durante unos tres o cuatro minutos y le damos la vuelta.
            ',
            'description'=> 'La tortilla de patatas o tortilla española es uno de los platos por excelencia de la gastronomía española. Para hacerla sólo necesitamos tres ingredientes: huevos, patatas y un buen aceite.'
        ]);

        Recipe::create([
            'title' => 'Empanadillas de carne',
            'photo' => 'null',
            'ingredients' => "['carne picada', 'cebolla', 'ajo', 'huevo', 'tomate', 'aceite de oliva', 'oregano', 'comino', 'pimentón molido', 'masa para empanadas']",
            'displayIngredients' => "['500 g carne picada de ternera', '1/2 kg de cebolla', '1 diente de ajo picado', '1 cebolla', '2 huevos duros', '1 lata de tomate', 'aceite de oliva', 'ajo molido', 'orégano seco', '1 cucharadita de comino', '1 cucharadita de pimentón', '12 masa para empanadas', '1 huevo batido']",
            'preparation' => '- Rehogar en una sartén la cebolla, el ajo y la cebolla de verdeo.
            - Agregar la carne picada junto al tomate en conserva.
            - Agregar la Maizena disuelta en el agua fría y cocinar por 1 minuto más.
            - Condimentar con las especias y el huevo duro.
            - Dejar reposar y enfriar. Rellenar y montar las empanadas y pintar con el huevo batido.
            - Cocinar en el horno a 200º hasta que se queden doradas.',
            'description'=> 'Las empanadas criollas son uno de los platos más tradicionales de ese país.La masa de las empanadas argentinas es muy similar a nuestra receta de empanadillas, y lo que varía es el relleno, que se prepara con carne picada y diferentes especias. Estas empanadas criollas de carne picada las
            puedes preparar fritas o al horno, y en cualquiera de los dos casos están deliciosas.'
        ]);

        Recipe::create([
            'title' => 'Pollo al horno',
            'photo' => 'https://i.ytimg.com/vi/BPfyLmVzsaM/maxresdefault.jpg',
            'ingredients' => "['pollo', 'patata', 'cebolla', 'ajo', 'pimienta negra', 'prejil', 'sal', 'limon', 'vino blanco', 'aceite de oliva']",
            'displayIngredients' => "['1 pollo entero', '4 patatas', '2 cebollas', '2 cebollas', '3 dientes de ajo', '5 granos de pimienta negra', 'Unas ramas de perejil', 'Sal', 'Medio limon', '1 vasito de vino blanco', 'Aceite de oliva virgen']",
            'preparation' => '- En una fuente apta para el horno ponemos un chorreón de aceite de oliva virgen o virgen extra y ponemos por encima rodajas de patatas, que hemos pelado y cortado y la cebolla cortada en rodajas o a cuartos, reservaremos media cebolla.
            - En un mortero machacamos los dientes de ajo, los granos de pimienta, el perejil y un puñadito de sal.
            - metemos dentro medio limón y media cebolla cortados a cuartos.

            - Echar tomate.',
            'description'=> '- Hoy toca pollo al horno para comer, una de esas comidas que gusta a toda la familia. ¿Quién no recuerda siendo pequeño esos pollos asados que preparaba tu madre o abuela y que llenaban la casa de olores increíbles…?'

        ]);
    }
}
