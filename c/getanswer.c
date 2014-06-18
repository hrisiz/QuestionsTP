#include<stdio.h>
int main(){
	long a = 0x57BD09B6;
	int result = 0;
	if(a & (1 << 11))
	result = 1;
	else
	result = 2;
	printf("result = %d",result);	return 0;
}