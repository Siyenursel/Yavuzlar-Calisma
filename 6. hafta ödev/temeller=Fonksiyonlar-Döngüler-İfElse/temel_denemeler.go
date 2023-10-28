//DİLİN TEMEL ÖZELLİKLERİ İLE İLGİLİ GENEL DENEMELER.
//DEĞİŞKENLER - FONSKİYONLAR - REQURSİVE FONKSİYONLAR - DÖNGÜLER - İF ELSE -

package main

import "fmt"

func main() {
	fmt.Println("Merhaba Dünya!")
	fmt.Print("merhaba dünya\n")
	//toplama fonksiyonu
	fmt.Println(toplama(2, 6))
	//reqursive faktöriyel fonksiyonu
	fmt.Println(fakto(6))

	//boş tanımlayıcı
	ikiyeböl, _ := işlem(20)
	fmt.Println(ikiyeböl)

	fmt.Println("\n\n\nfor loop deneme sonuç\n.")

	//for loop deneme
	for i := 0; i < 10; i++ {
		fmt.Println(i)
	}

	fmt.Println("\n\n\nfor loop reqursive çevirme sonuç\n.")

	//for loopta yapılanın tersini reqursive yazdırma
	req(10)

	fmt.Println("\n\n\nreqursive olanı deferle terse çevirme sonuç\n.")

	//req fonksiyonunu defer ile tersine çevirme
	reqdefer(10)

	fmt.Println("\n\n\n farklı bir for loop sonuç\n.")

	//farklı bir for loop
	değer := 5
	for değer < 10 {
		fmt.Println(değer)
		değer++
	}

	fmt.Println("\n\n\nelse if sonuç\n.")

	//else if
	deger2 := 3
	if deger2 == 5 {
		fmt.Println("değer 5dir")
	} else if deger2 == 3 {
		fmt.Println("deger 3dür")
	} else {
		fmt.Println("deger 3 5 değildir")
	}

}

// toplama fonksiyonu
func toplama(a int, b int) int {
	return a + b
}

// reqursive faktöriyel fonksiyonu
func fakto(a int) int {
	if a == 0 {
		return a
	}
	return a * fakto(a-1)

}

// boş tanımlayıcının fonksiyonu
func işlem(a int) (int, int) {
	işlem1 := a / 2
	işlem2 := a / 4
	return işlem1, işlem2

}

// for loopta yapılanın tersini reqursive yazdırma
func req(a int) int {
	if a == 0 {
		return 1
	}
	a -= 1
	fmt.Println(a)
	return req(a)
}

// req fonksiyonunu defer ile tersine çevirme
func reqdefer(a int) int {
	if a == 0 {
		return 1
	}
	a -= 1
	defer fmt.Println(a)
	return req(a)
}
