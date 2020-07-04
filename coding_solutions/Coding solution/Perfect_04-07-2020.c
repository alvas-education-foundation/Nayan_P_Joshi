#include<stdio.h>

int divisorsum(int n)
{
   int sum = 0,i; 
   for ( i=1; i*i <= n; ++i)
   {
      if (n%i == 0)
	  { 
	  if (i == (n/i))
            sum += i;
         else
            sum += (i + n/i);
      }
   }
   return sum;
}
int main() {
   int n = 16;
   int n1 = divisorsum(n);
   if(2*n == divisorsum(n1)){
      printf("The number %d is a superperfect number", n);
   } else{
      printf("The number %d is not a superperfect number", n);
   }
   return 0;
}


