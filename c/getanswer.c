#include<stdio.h>
int main(){
	long a = 789;
	long b = 034;
	int result = (a << 3) ^ (b >> 11);
	printf("result = %d",result);	return 0;
}