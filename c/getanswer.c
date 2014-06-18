#include<stdio.h>
int main(){
	long a = 9;
	long b = 603;
	int result = (a << 3) ^ (b >> 9);
	printf("result = %d",result);	return 0;
}