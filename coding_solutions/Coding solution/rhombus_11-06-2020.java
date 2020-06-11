package pk;
import java.io.*;
import java.util.Scanner;
public class rhombus {
	public static void main(String args[])
	{
	Scanner sc = new Scanner(System.in);
	int i, j;
	System.out.println("enter the n value");
	int n = sc.nextInt();
	System.out.println("Solid Rhombus");
	for(i = 0; i < n; i++)
	{
	for(j = 0; j < n -i; j++)
	{
	System.out.print(" ");  
	}
	for(j = 0; j < n; j++)
	{
	System.out.print("*");
	}
	System.out.println();
	}
	System.out.println("Hollow Rhombus");
	for(i = 0; i < n; i++)
	{
	for(j = 0; j < n -i; j++)
	{
	System.out.print(" ");  
	for(j = 0; j < n; j++)
	{
	if(i== 0 || i == n -1 || j == 0 || j == n -1)
	System.out.print("*");
	else
	System.out.print(" "); 
	}
	System.out.println();
	} 
	}
	}


}
