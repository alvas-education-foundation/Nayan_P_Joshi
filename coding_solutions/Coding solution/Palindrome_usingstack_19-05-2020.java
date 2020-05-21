
/*Program2(Write a simple code to identify given linked list is palindrome or not by using stack.)*/

import java.util.Stack;
class Node {
int data;
Node next;

Node(int i)
{
this.data = i;
this.next = null;
}
};

class Main
{
// Function to determine if a given linked list is palindrome or not
public static boolean isPalindrome(Node head)
{
// construct an empty stack
Stack s = new Stack<>();

// push all elements of the linked list into the stack
Node node = head;
while (node != null) {
	s.push(node.data);
	node = node.next;
}
// traverse the linked list again
node = head;
while (node != null)
{
	int top = s.pop();

	// compare the popped element with current node's data
	// return false if mismatch happens
	if (top != node.data) {
		return false;
	}

	node = node.next;
}
return true;
}

public static void main(String[] args)
{
Node head = new Node(1);
head.next = new Node(2);
head.next.next = new Node(3);
head.next.next.next = new Node(2);
head.next.next.next.next = new Node(1);

if (isPalindrome(head)) {
	System.out.print("Linked List is a palindrome.");
} else {
	System.out.print("Linked List is not a palindrome.");
}
}
