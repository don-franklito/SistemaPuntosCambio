#include<iostream>

using namespace std;

main()
{

    int edad[20];//Aqui declare mi vector, y le puse un tamaño de 20 porque es el que nos indico 
    int f=0;
    int may=0; 
    int men=0;
    float por, porc;

    for (int f = 0; f < 20; f++) //Aqui ingresas las 20 edades que le daras al vector para que las guarde
    {
       
        cout << "Ingrese la edad: "; 
        cin >> edad[f];
        cin.get();
    }

    for (int f = 0; f < 20; f++)//Aqui se realizaron las condiciones, y dependiendo su condicion tiene su contador
    {
       
        cout << edad[f];
        if (edad[f] >= 15)
        {
           may=may+1;
        }
        else
        {
            if (edad[f] <15)
            {
                men=men+1;
            }
          
        }
        cout << "\n";
    }
    
    por=may*100/20;//Y en esta parte realice la operacion para obtener el porcentaje
    porc=men*100/20;
    
    cout<<"Edades mayores o iguales a 15: "<<may<<" y su porcentaje es: "<<por<<"%"<<endl;
    cout<<"Edades menores a 15: "<<men<<" y su porcentaje es: "<<porc<<"%"<<endl;

    cin.get();
    cin.get();
}
