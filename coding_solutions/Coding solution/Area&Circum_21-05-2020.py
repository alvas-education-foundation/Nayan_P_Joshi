def ac(r):
    return 3.142*r*r
def cc(r):
    return 2*3.142*r
def sa(a):
    return a*a
def ca(a):
    return 4*a

print("Select operation.")
print("1.Area of Circle")
print("2.Circumference of Circle ")
print("3.Area of Square")
print("4.Circumference of Square")

while(true):
    # Take input from the user
    choice = input("Enter choice(1/2/3/4): ")

    # Check if choice is one of the four options
    if choice in ('1', '2','3','4'):
        r = float(input("Enter r value "))
        a = float(input("Enter a value: "))

        if choice == '1':
            print("The area of a circle is",ac(r))

        elif choice == '2':
            print("the circumference of a circle is",cc(r))

        elif choice == '3':
              print("The area of a square is",sa(a))


        elif choice == '4':
             print("the circumference of a sqaure is",ca(a))
        break
    else:
        print("Invalid Input")
            
            
             
             

             
