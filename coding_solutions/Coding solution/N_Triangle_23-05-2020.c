void triangular_series(int n)
{
int i;
for(i = 0; i <= n; i++)

printf(" %d ", i*(i+1)/2);
}

int main()
{

int n ;
printf("Enter value for n\n");

scanf("%d",&n);

triangular_series(n);

return 0;
}
