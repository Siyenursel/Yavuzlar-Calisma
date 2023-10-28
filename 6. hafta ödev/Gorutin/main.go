//gorutin ve channellar

package main

import (
	"fmt"
	"time"
)

func main() {

	go TekSayılar()
	go çiftSayılar()
	time.Sleep(3 * time.Second)
	fmt.Println("bitti")

	fmt.Println("\n\n2. aşama")
	ciftSayıCn := make(chan int)
	tekSayıCn := make(chan int)

	go TekSayılarChannel(tekSayıCn)
	go çiftSayılarChannel(ciftSayıCn)

	ciftSayiToplam, tekSayiToplam := <-ciftSayıCn, <-tekSayıCn
	carpim := ciftSayiToplam * tekSayiToplam
	fmt.Println("çarpım : ", carpim)
	fmt.Println("\n\n2. aşama bitiş")

}

func TekSayılar() {

	for i := 0; i <= 10; i += 2 {
		fmt.Println("tek sayılar:", i)
		time.Sleep(1 * time.Second)
	}
}

func çiftSayılar() {

	for i := 1; i <= 10; i += 2 {
		fmt.Println("çift sayılar:", i)
		time.Sleep(1 * time.Second)
	}
}

func TekSayılarChannel(tekSayıCn chan int) {
	toplam := 0
	for i := 0; i <= 10; i += 2 {
		toplam = toplam + i

	}
	tekSayıCn <- toplam
}

func çiftSayılarChannel(ciftSayıCn chan int) {
	toplam := 0
	for i := 1; i <= 10; i += 2 {

		toplam = toplam + i
	}
	ciftSayıCn <- toplam
}
