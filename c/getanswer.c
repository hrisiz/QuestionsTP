#include<stdio.h>
int main(){
  int orig = 0xF0F0;int insert = 0x000A;int result = orig | (insert << 8);printf("%X",result);
  return 0;
}