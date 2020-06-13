#include <stdio.h>
 
int main()
{
	int units;
	float Amount;
  	
	printf("\n Please Enter the Units that you Consumed  :  ");
  	scanf("%d", &units);
  
  if (units <= 100) { 
            Amount=units * 10; 
        } 
        else if (units <= 200) { 
            Amount=(100 * 10) + (units - 100) * 15; 
        } 
        else if (units <= 300) { 
             Amount=(100 * 10) + (100 * 15) + (units - 200) * 20; 
        } 
        else if (units > 300) { 
            Amount=(100 * 10) + (100 * 15) + (100 * 20) + (units - 300) * 25; 
        } 
  	printf("\n  Total Electricity Bill is =  %f",Amount); 
}
