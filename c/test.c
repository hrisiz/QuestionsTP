#include<stdio.h>
int main(){int a = 0x0FFF;
int b = 0xF000;
int result = a | (b << 4);
printf("result = %X",result);
int a = 0xF00F0FFF;
int b = 0x0F00FF0F;
int result = a | (b << 3);
printf("result = %X",result);
	int a = 0x7ED0;
	int b = 0x803B;
	int a1 = a | (b << 4);
	int b1 = a | (b << 8);
	int result = a1 & b1;
	printf("result = %X",result);	int a = 0x4328;
	int b = 0x2806;
	int a1 = a | (b << 3);
	int b1 = a | (b << 7);
	int result = a1 & b1;
	printf("result = %X",result);	int a = 0xDD69;
	int b = 0xD4A0;
	int a1 = a | (b << 11);
	int b1 = a | (b << 3);
	int result = a1 ^ b1;
	printf("result = %X",result);	int a1 = 0xBBD7;
	int result = a1 << 3;
	printf("result = %X",result);	long a = 0x97EB099C;
	long b = 0xD99D61B0;
	int result = (a << 3) ^ (b >> 7);
	printf("result = %X",result);	long a = 813;
	long b = 909;
	int result = (a << 12) ^ (b >> 3);
	printf("result = %d",result);	long a = 0x4D93BCB0;
	int result = 0;
	if(a & (1 << 10))
	result = 1;
	else
	result = 2;
	printf("result = %d",result);	long a = 0x52F5933E;
	int result = 0;
	int result1 = 0;
	if((result = a & a ^ a | (1 << 3)))
	result1 = 1;
	else
	result1 = 2;
	printf("result = %d,result1 = %X",result,result1);	long a = 751;
	long b = 915;
	int result = (a << 3) ^ (b >> 5);
	printf("result = %d",result);	long a = 839;
	long b = 820;
	int result = (a << 10) ^ (b >> 12);
	printf("result = %d",result);