import java.io.*;
import java.lang.*;
import java.util.*;
public class funcionesdeprecadas {

    static int totalLineas;
    static int totalCoincidencias;
    static String cadena;
    static String opcion;

    public static void main(String[] args) {

        System.out.println("Elije la opcion");
        opcion = "Prueba";

        try{

            switch(opcion){

                case "Prueba":
                    System.out.println("Entraste a opPrueba");
                    opPrueba();

                break;

                case "Python":
                    System.out.println("Entraste a opPython");
                    //opPython();

                    break;

                case "PHP":
                    System.out.println("Entraste a opPHP");
                   // opPHP();

                    break;

                case "Java":
                    System.out.println("Entraste a opJava");
                   // opJava();

                    break;

                case "JavaScript":
                    System.out.println("Entraste a opJavaScript");
                    //opJavaScript();

                    break;

                case "C++":
                    System.out.println("Entraste a opC++");
                   // opCmasmas();

                    break;

                case "C#":
                    System.out.println("Entraste a opCgato");
                   // opCgato();

                    break;
            }

        }catch(Exception e){

            System.out.println("Ups! Error, no elegiste una opcion");
        }


    }

    static void lectorCoincidencias(ArrayList<String> diccionarioArray, ArrayList<String> cambioSintaxisArray, ArrayList<String> diccionarioAnidadoArray, ArrayList<String> cambioSintaxisAnidadoArray){

        FileReader archivo;
        Scanner lector;

        try {

            archivo = new FileReader("C:\\Users\\yasmin.valdez\\Desktop\\Java\\codigofuente.txt");

            if (archivo.ready()) {

                lector = new Scanner(archivo);

                while (lector.hasNext()) {

                    cadena = lector.nextLine();

                    totalLineas = totalLineas + 1;

                    String[] palabras = cadena.split(" ");

                    for (int i = 0; i < palabras.length; i++) {

                        if (diccionarioArray.contains(palabras[i])) {

                            totalCoincidencias = totalCoincidencias + 1;

                            impresionCadena ();

                            System.out.println("En la linea: " + totalLineas + " se encontro la palabra: " + palabras[i] + "\n");

                        }

                        for (int j = 0; j < diccionarioAnidadoArray.size(); j++) {

                            String palabra = diccionarioAnidadoArray.get(j);
                            int index1 = palabras[i].indexOf(palabra);
                            int index2 = index1 + palabra.length(); 

                            if(palabras[i].indexOf(palabra) != -1){

                                totalCoincidencias = totalCoincidencias + 1;

                                impresionCadena ();

                                System.out.println("En la linea: " + totalLineas + " se encontro la palabra: "+ palabras[i].substring(index1, index2) + "\n");

                            }
                        }

                    }
                }

                impresionTotalCL();

            } else {

                System.out.println("El archivo no existe para ser leido");
            }


        } catch (Exception e) {

            System.out.println("Error: " + e.getMessage());

        }

    }

    static void opPrueba(){

        ArrayList<String> diccionarioArray = new ArrayList<>();

        diccionarioArray.add("var");
        diccionarioArray.add("let");
        diccionarioArray.add("const");
        diccionarioArray.add("null");
        diccionarioArray.add("switch");
        diccionarioArray.add("for");
        diccionarioArray.add("while");
        diccionarioArray.add("function");
        diccionarioArray.add("class");
        diccionarioArray.add("===");
        diccionarioArray.add("&&");
        diccionarioArray.add("||");
        diccionarioArray.add("!");
        diccionarioArray.add("typeof");
        diccionarioArray.add("window.prompt");
        diccionarioArray.add("console.log");
        diccionarioArray.add("if");
        diccionarioArray.add("else if");
        diccionarioArray.add("else");

        ArrayList<String> cambioSintaxisArray = new ArrayList<>();

        cambioSintaxisArray.add(" quitar el tipo de dato");
        cambioSintaxisArray.add(" quitar el tipo de dato");
        cambioSintaxisArray.add(" quitar dicha constante");
        cambioSintaxisArray.add(" cambiar por (None)");
        cambioSintaxisArray.add(" Python no tiene esta sentencia incorporada");
        cambioSintaxisArray.add(" se necesita cambio de estructura");
        cambioSintaxisArray.add(" cambiar ({) por (:) e identifica el fin del bloque para borrar (}) ");
        cambioSintaxisArray.add(" cambiar por (def)");
        cambioSintaxisArray.add(" cambiar ({) por e identifica el fin del bloque para borrar (})");
        cambioSintaxisArray.add(" cambiar por (==)");
        cambioSintaxisArray.add(" cambiar por (and)");
        cambioSintaxisArray.add(" cambiar por (or)");
        cambioSintaxisArray.add(" cambiar por (not)");
        cambioSintaxisArray.add(" cambiar por (type) y colocar la instancia entre ()");
        cambioSintaxisArray.add(" cambiar por (input)");
        cambioSintaxisArray.add(" cambiar por (print)");
        cambioSintaxisArray.add(" se quitan los parentesis de la condición y se colocan (:) quitamos las ({}) e indentamos el codigo.");
        cambioSintaxisArray.add(" se cambia por (elif), se quita de la condición los parentesis. Luego de la condición, se colocan (:) y se quita el par de llaves.");
        cambioSintaxisArray.add(" se quitan las ({}) y se colocan (:) despues del else");
        cambioSintaxisArray.add(" se indenta el codigo perteneciente a esta clausula y se borra (})");

        ArrayList<String> diccionarioAnidadoArray = new ArrayList<>();

        diccionarioAnidadoArray.add("//");
        diccionarioAnidadoArray.add("/*");
        diccionarioAnidadoArray.add("*/");
        diccionarioAnidadoArray.add("{");
        diccionarioAnidadoArray.add("}");

        ArrayList<String> cambioSintaxisAnidadoArray = new ArrayList<>();

        cambioSintaxisAnidadoArray.add(" cambiar por (#)");
        cambioSintaxisAnidadoArray.add(" cambiar por tres comillas dobles la instruccion del comentario");
        cambioSintaxisAnidadoArray.add(" cambiar por tres comillas dobles la instruccion del comentario");
        cambioSintaxisAnidadoArray.add(" se indenta el codigo perteneciente a esta clausula y se escriben (:) en lugar de ({)");
        cambioSintaxisAnidadoArray.add(" se indenta el codigo perteneciente a esta clausula y se borra (})");

        lectorCoincidencias(diccionarioArray, cambioSintaxisArray, diccionarioAnidadoArray, cambioSintaxisAnidadoArray);
    }
/* 
      static void opPython(){

ArrayList<String> diccionarioArray = new ArrayList<>();

        diccionarioArray.add("and");
        diccionarioArray.add("del");
        diccionarioArray.add("for");
        diccionarioArray.add("is");
        diccionarioArray.add("raise");
        diccionarioArray.add("assert");
        diccionarioArray.add("elif");
        diccionarioArray.add("from");
        diccionarioArray.add("lambda");
        diccionarioArray.add("return");
        diccionarioArray.add("break");
        diccionarioArray.add("else");
        diccionarioArray.add("global");
        diccionarioArray.add("not");
        diccionarioArray.add("try");
        diccionarioArray.add("class");
        diccionarioArray.add("except");
        diccionarioArray.add("if");
        diccionarioArray.add("or");
        diccionarioArray.add("while");
        diccionarioArray.add("continue");
        diccionarioArray.add("exec");
        diccionarioArray.add("import");
        diccionarioArray.add("pass");
        diccionarioArray.add("with");
        diccionarioArray.add("def");
        diccionarioArray.add("finally");
        diccionarioArray.add("in");
        diccionarioArray.add("print");
        diccionarioArray.add("yield");
        diccionarioArray.add("nonlocal");
        diccionarioArray.add("false");
        diccionarioArray.add("true");
        diccionarioArray.add("none");
        diccionarioArray.add("await");
        diccionarioArray.add("with");
        diccionarioArray.add("#");
        diccionarioArray.add('"""');
        diccionarioArray.add(">>>");
        diccionarioArray.add("<<<");
        diccionarioArray.add("&");
        diccionarioArray.add(";");
        diccionarioArray.add("urllib.parse.parse_qs");  
        diccionarioArray.add("urllib.parse.parse_qsl");
        diccionarioArray.add("cgi.parse");            
        diccionarioArray.add("cgi.parse_multipart");    
        diccionarioArray.add("asyncio.loop.create_datagram_endpoint");
        diccionarioArray.add("aifc");
        diccionarioArray.add("asyncio");
        diccionarioArray.add("collections");
        diccionarioArray.add("dbm");
        diccionarioArray.add("enum");
        diccionarioArray.add("gettext");
        diccionarioArray.add("importlib");
        diccionarioArray.add("locale");
        diccionarioArray.add("macpath");
        diccionarioArray.add("threading");
        diccionarioArray.add("socket");
        diccionarioArray.add("ssl");
        diccionarioArray.add("sunau");
        diccionarioArray.add("sys");
        diccionarioArray.add("wave");
        diccionarioArray.add("PySlice_GetIndicesEx");
        diccionarioArray.add("PyOS_AfterFork");
        diccionarioArray.add("object.__aiter__");

        lectorCoincidencias(diccionarioArray);
      }

    static void opPHP(){

    ArrayList<String> diccionarioArray = new ArrayList<>();

        diccionarioArray.add("as");
        diccionarioArray.add("switch");
        diccionarioArray.add("case");
        diccionarioArray.add("for");
        diccionarioArray.add("break");
        diccionarioArray.add("callable");
        diccionarioArray.add("catch");
        diccionarioArray.add("clone");
        diccionarioArray.add("continue");
        diccionarioArray.add("declare");
        diccionarioArray.add("default");
        diccionarioArray.add("while");
        diccionarioArray.add("do");
        diccionarioArray.add("empty");
        diccionarioArray.add("enddeclare");
        diccionarioArray.add("endfor");
        diccionarioArray.add("endforeach");
        diccionarioArray.add("endif");
        diccionarioArray.add("endswitch");
        diccionarioArray.add("endwhile");
        diccionarioArray.add("extends");
        diccionarioArray.add("finally");
        diccionarioArray.add("final");
        diccionarioArray.add("fn");
        diccionarioArray.add("foreach");
        diccionarioArray.add("global");
        diccionarioArray.add("implements");
        diccionarioArray.add("include");
        diccionarioArray.add("include_once");
        diccionarioArray.add("instanceof");
        diccionarioArray.add("insteadof");
        diccionarioArray.add("interface");
        diccionarioArray.add("isset");
        diccionarioArray.add("list");
        diccionarioArray.add("namespace");
        diccionarioArray.add("new");
        diccionarioArray.add("private");
        diccionarioArray.add("protected");
        diccionarioArray.add("public");
        diccionarioArray.add("require");
        diccionarioArray.add("require_once");
        diccionarioArray.add("function");
        diccionarioArray.add("static");
        diccionarioArray.add("throw");
        diccionarioArray.add("trait");
        diccionarioArray.add("try");
        diccionarioArray.add("xor");
        diccionarioArray.add("yield");
        diccionarioArray.add("yield from");
        diccionarioArray.add("echo");

        lectorCoincidencias(diccionarioArray);
    }
    static void opJava(){
 
    ArrayList<String> diccionarioArray = new ArrayList<>();

        diccionarioArray.add("for");
        diccionarioArray.add("while");
        diccionarioArray.add("do-while");
        diccionarioArray.add("Class");
        diccionarioArray.add("if");
        diccionarioArray.add("SQLQuery");
        diccionarioArray.add("preparedStatement");
        diccionarioArray.add("getConnection");
        diccionarioArray.add("Array");
        diccionarioArray.add("ArrayList");
        diccionarioArray.add("import");
        diccionarioArray.add("package");
        diccionarioArray.add("/*");
        diccionarioArray.add("//");
        diccionarioArray.add("==");
        diccionarioArray.add("&&");
        diccionarioArray.add("||");
        diccionarioArray.add("if else");
        diccionarioArray.add("System.out");
        diccionarioArray.add("catch");
        diccionarioArray.add("implements");
        diccionarioArray.add("new");
        diccionarioArray.add("switch");
        diccionarioArray.add("this");
        diccionarioArray.add("brake");
        diccionarioArray.add("case");

        lectorCoincidencias(diccionarioArray);
    }
    static void opJavaScript(){

        ArrayList<String> diccionarioArray = new ArrayList<>();

        diccionarioArray.add("var");
        diccionarioArray.add("let");
        diccionarioArray.add("const");
        diccionarioArray.add("null");
        diccionarioArray.add("switch");
        diccionarioArray.add("for");
        diccionarioArray.add("while");
        diccionarioArray.add("function");
        diccionarioArray.add("class");
        diccionarioArray.add("===");
        diccionarioArray.add("&&");
        diccionarioArray.add("||");
        diccionarioArray.add("!");
        diccionarioArray.add("typeof");
        diccionarioArray.add("window.prompt");
        diccionarioArray.add("console.log");
        diccionarioArray.add("if");
        diccionarioArray.add("else if");
        diccionarioArray.add("else");

        lectorCoincidencias(diccionarioArray);
    }
    static void opCmasmas(){

    ArrayList<String> diccionarioArray = new ArrayList<>();

        diccionarioArray.add("throw(typeid)");
        diccionarioArray.add("Trigraphs");
        diccionarioArray.add("std::auto_ptr");
        diccionarioArray.add("std::random_shuffle");
        diccionarioArray.add("std::uncaught_exception");
        diccionarioArray.add("throw()");
        diccionarioArray.add("result_of");
        diccionarioArray.add("codecvt");
        diccionarioArray.add("memory_order_consume");

        lectorCoincidencias(diccionarioArray);
    }
    static void opCgato(){

    ArrayList<String> diccionarioArray = new ArrayList<>();

        diccionarioArray.add("using");
        diccionarioArray.add("namespace");
        diccionarioArray.add("class");
        diccionarioArray.add("void");
        diccionarioArray.add("Console");
        diccionarioArray.add("WriteLine");
        diccionarioArray.add("new");
        diccionarioArray.add("char");
        diccionarioArray.add("string");
        diccionarioArray.add("bool");
        diccionarioArray.add("double");
        diccionarioArray.add("ToString");
        diccionarioArray.add("Write");
        diccionarioArray.add("//");
        diccionarioArray.add("break");
        diccionarioArray.add("throw");
        diccionarioArray.add("try");
        diccionarioArray.add("checked");
        diccionarioArray.add("unchecked");
        diccionarioArray.add("lock");
        diccionarioArray.add("[]");
        diccionarioArray.add("throw ");
        diccionarioArray.add("throw ");

        lectorCoincidencias(diccionarioArray);
    }
*/
    static void impresionCadena (){

        System.out.println(cadena + "\n");

    }

    static void impresionTotalCL(){

        System.out.println("\n" + "El total de coincidencias para puntos de cambio son: " + totalCoincidencias + " puntos de cambio" + "\n");

        System.out.println("El total de lineas evaluadas son: " + totalLineas + " lineas");

    }

}