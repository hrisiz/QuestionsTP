#include<stdio.h>
int main(){int a = 0xF0F0;
int b = 0x00FF;
int result = a | (b << 8);
printf("result = %X",result);
int a = 0x00FFFF0F;
int b = 0x00F0FF0F;
int result = a | (b << 11);
printf("result = %X",result);
	int a = 0x6E9B;
	int b = 0x290E;
	int a1 = a | (b << 4);
	int b1 = a | (b << 8);
	int result = a1 & b1;
	printf("result = %X",result);	int a = 0xFDB4;
	int b = 0x3C7F;
	int a1 = a | (b << 10);
	int b1 = a | (b << 3);
	int result = a1 & b1;
	printf("result = %X",result);	int a = 0x837A;
	int b = 0xFC6E;
	int a1 = a | (b << 6);
	int b1 = a | (b << 5);
	int result = a1 ^ b1;
	printf("result = %X",result);	int a1 = 0x7826;
	int result = a1 << 6;
	printf("result = %X",result);	long a = 0xFE5D4B35;
	long b = 0x6DEBD80A;
	int result = (a << 6) ^ (b >> 5);
	printf("result = %X",result);	long a = 868;
	long b = 034;
	int result = (a << 6) ^ (b >> 3);
	printf("result = %d",result);	long a = 0xA11B8B05;
	int result = 0;
	if(a & (1 << 3))
	result = 1;
	else
	result = 2;
	printf("result = %d",result);	long a = 0x19575353;
	int result = 0;
	int result1 = 0;
	if((result = a & a ^ a | (1 << 3)))
	result1 = 1;
	else
	result1 = 2;
	printf("result = %d,result1 = %X",result,result1);	long a = 901;
	long b = 103;
	int result = (a << 12) ^ (b >> 7);
	printf("result = %d",result);	long a = 614;
	long b = 490;
	int result = (a << 12) ^ (b >> 3);
	printf("result = %d",result);return 0;
}