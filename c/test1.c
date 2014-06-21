#include<stdio.h>
int main(){int a = 0xFF0F;
int b = 0x00FF;
int result = a | (b << 8);
printf("result = %X",result);

a = 0x00FFF00F
b = 0x0000000F
result = a | (b << 6)
printf("result = %X",result);

a = 0x76EE
b = 0x6012
	int a1 = a | (b << 4);
	int b1 = a | (b << 8);
result = a1 & b1
	printf("result = %X",result);
a = 0x8DE0
b = 0x9812
a1 = a | (b << 3)
b1 = a | (b << 12)
result = a1 & b1
	printf("result = %X",result);
a = 0x2570
b = 0xDB31
a1 = a | (b << 3)
b1 = a | (b << 6)
result = a1 ^ b1
	printf("result = %X",result);
a1 = 0x4047
result = a1 << 11
	printf("result = %X",result);
a = 0xA2C0660C
b = 0x93645A2F
result = (a << 3) ^ (b >> 6)
	printf("result = %X",result);
a = 171
b = 430
result = (a << 11) ^ (b >> 3)
	printf("result = %d",result);
a = 0xA566DCF0
result = 0
	if(a & (1 << 9))
	result = 1;
	else
	result = 2;
	printf("result = %d",result);
a = 0xB1D33B56
result = 0
	int result1 = 0;
	if((result = a & a ^ a | (1 << 9)))
	result1 = 1;
	else
	result1 = 2;
	printf("result = %d,result1 = %X",result,result1);
a = 087
b = 628
result = (a << 7) ^ (b >> 10)
	printf("result = %d",result);
a = 706
b = 293
result = (a << 3) ^ (b >> 5)
	printf("result = %d",result);
return 0;
}