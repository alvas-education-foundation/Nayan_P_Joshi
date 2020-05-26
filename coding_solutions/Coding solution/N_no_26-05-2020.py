n = int(input("Enter a Number : "))
series_sum = []
for i in range(1,n+1):
    series_sum.append(i)
    if i==n:
         print(i, end='')
    else:
         print(i,end=' + ')
print(' = ', sum(series_sum), sep='')
