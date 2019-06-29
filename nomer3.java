import java.io.*;
public class Main
{
	public static void main(String[] args) {
		BufferedReader masuk = new BufferedReader (new InputStreamReader(System.in));
       
            int a = 8;
        for (int i = a; i > 0; i--) {
            for (int j = 0; j < i; j++) {
                System.out.print(" ");
            }for (int j = a; j > i; j--) {
                if (j==a||i==1)
                    System.out.print(" *");
                else
                    System.out.print("  ");
            }System.out.println(" *");
        }
   
	}
}