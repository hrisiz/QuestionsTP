#include<stdio.h>
int main(){int a = 0xF0F0;
int b = 0xF0FF;
int result = a | (b << 4);
printf("result = %X",result);
int a = 0x00F00000;
int b = 0x0F0FFF00;
int result = a | (b << 6);
printf("result = %X",result);
	int a = 0x9B87;
	int b = 0x0BF4;
	int a1 = a | (b << 4);
	int b1 = a | (b << 4);
	int result = a1 & b1;
	printf("result = %X",result);	int a = 0xCF99;
	int b = 0xD209;
	int a1 = a | (b << 3);
	int b1 = a | (b << 3);
	int result = a1 & b1;
	printf("result = %X",result);	int a = 0x438A;
	int b = 0x301B;
	int a1 = a | (b << 7);
	int b1 = a | (b << 7);
	int result = a1 ^ b1;
	printf("result = %X",result);	int a1 = 0x6492;
	int result = a1 << 9;
	printf("result = %X",result);	long a = 0xD2E18CD1;
	long b = 0xF6D4EBEA;
	int result = (a << 6) ^ (b >> 10);
	printf("result = %X",result);	long a = 747;
	long b = 942;
	int result = (a << 9) ^ (b >> 5);
	printf("result = %d",result);	long a = 0xE588386A;
	int result = 0;
	if(a & (1 << 10))
	result = 1;
	else
	result = 2;
	printf("result = %d",result);	long a = 0xE2BC083D;
	int result = 0;
	int result1 = 0;
	if((result = a & a ^ a | (1 << 12)))
	result1 = 1;
	else
	result1 = 2;
	printf("result = %d,result1 = %X",result,result1);	long a = 570;
	long b = 555;
	int result = (a << 3) ^ (b >> 7);
	printf("result = %d",result);	long a = 795;
	long b = 603;
	int result = (a << 7) ^ (b >> 5);
	printf("result = %d",result);