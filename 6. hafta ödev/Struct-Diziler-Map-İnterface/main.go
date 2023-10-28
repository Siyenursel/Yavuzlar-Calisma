//2. Deneme dosyası
//STRUCT - ARRAY - MAP - İNTERFACE

package main

import "fmt"

type kişi struct {
	isim    string
	soyisim string
	yaş     int
}

type sayılar struct {
	Sayı1, Sayı2, Sayı3 int
}

var m = map[string]sayılar{
	"tekler":  sayılar{1, 3, 5},
	"çiftler": sayılar{2, 4, 6},
}

type kedi struct {
}

func (s kedi) Ye() {
	fmt.Println("kedi yemini yedi")
}

type köpek struct {
}

func (s köpek) Ye() {
	fmt.Println("köpek yemini yedi")
}

type Yemek interface {
	Ye()
}

func main() {
	kişi1 := kişi{"efe", "eftekin", 23}
	fmt.Println(kişi1)

	a := [5]int{1, 2, 4, 6, 9}
	fmt.Println(a)
	fmt.Println(a[1:4])

	for b, c := range a {
		fmt.Printf("%d. index = %d\n", b, c)
	}

	fmt.Println(m["tekler"])
	fmt.Println(m["çiftler"])
	fmt.Println(m)

	fmt.Println("\n\ninterface örnek\n")
	köpek1 := köpek{}

	var hayvanım Yemek
	hayvanım = &köpek1

	hayvanım.Ye()

}
