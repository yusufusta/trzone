<div align="center">
  <h1>trzone</h1>
  <img src="https://s7.gifyu.com/images/ezgif.com-video-to-mp4.gif"></img>
</div>
<p align="center">
   <code>trzone</code>, Türk Geliştiriciler için adres/posta kodu bilgileri vermeye yarar.
   <p align="center">EnesUsta'nın <a href="https://github.com/enesusta/tzone">tzone</a> projesinden esinlenmiştir, veriler aynı yerden alınmıştır.
    <br>
        <a href="https://github.com/quiec/trzone/blob/master/README.md#-kurulum">📦 Kurulum</a> |
        <a href="https://github.com/quiec/trzone/blob/master/README.md#-fonksiyonlar">🛠 Fonksiyonlar</a> |
        <a href="https://github.com/quiec/trzone/blob/master/README-en.md">🇬🇧 English</a>
    <br>
</p>
</p>

----
## 📦 Kurulum
[Composer](https://getcomposer.org/) kullanarak hızlı bir şekilde kurabilir & kullanabilirsiniz:
```sh
composer require quiec/trzone
```

## 🛠 Fonksiyonlar
| Fonksiyon    | Parametre                     | Açıklama                                                                                                                          | Dönen Değer                                                                          |
|--------------|-------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------|
| getCity      | Şehir: int Plaka/str Şehir    | Şehir getirmek için kullanılır, plaka veya büyük harf şeklinde şehir ismi yazılabilinir.                                          | Boş bırakırsanız tüm illeri döndürür aksi takdirde $this döner.                      |
| getCounty    | İlçe: int Sıra/str İlçe       | Getirdiğiniz şehirin ilçelerine ulaşmak için kullanılır. İlçenin arraydaki sırası ya da büyük harflerle ismi ile ulaşabilirsiniz. | Boş bırakırsanız seçtiğiniz ilin ilçelerini döndürür aksi takdirde $this döner.      |
| getTown      | Semt: int Sıra/str Semt       | Getirdiğiniz ilçenin semtlerine ulaşmak için kullanılır. Semtin arraydaki sırası ya da büyük harflerle ismi ile ulaşabilirsiniz.  | Boş bırakırsanız seçtiğiniz ilçenin semtlerini döndürür aksi takdirde $this döner.   |
| getVillage   | Mahalle: int Sıra/str Mahalle | Getirdiğiniz semtin köylerine ulaşmak için kullanılır. Semtin arraydaki sırası ya da büyük harflerle ismi ile ulaşabilirsiniz.    | Boş bırakırsanız seçtiğiniz semtin mahallelerini döndürür aksi takdirde $this döner. |
| getZipCode   |                               | getTown fonksiyonunu kullandıktan sonra kullanılabilinir.                                                                         | Int şeklinde Posta kodu döndürür.                                                    |
| getPlaque    |                               | getCity fonksiyonunu kullandıktan sonra kullanılabilinir.                                                                         | Int şeklinde şehrin plakasını döndürür.                                              |
| searchPlaque | Şehir: str Şehir              | Şehir aramak için kullanılır. "igdir" yazsanız bile 76 döndürür.                                                                  | Int şeklinde şehrin plakasını döndürür.                                              |
| toArray      |                               | getCity fonksiyonunu kullandıktan sonra kullanılabilinir.                                                                         | Array şeklinde adres döndürür.                                                       |
| toString     | Ayraç: str Ayraç              | getCity fonksiyonunu kullandıktan sonra kullanılabilinir.                                                                         | Str şeklinde adres döndürür.                                                         |
| clear        |                               | Temizleme yapar.                                                                                                                  | $this                                                                                |

## 🔷 Örnek Kullanımlar
Birkaç güzel örnek:
İstanbul ilinin ilçelerini alalım:

```php
print_r($trzone->getCity("İSTANBUL")->getCounty());
```

Arama yapıp posta kodu alaım:
```php
# Adresi yazalım.
$Adres = $trzone->getCity( # İl getiriyoruz.
        $trzone->searchPlaque("istanbul") # İstanbul'un plakasını arıyoruz. searchPlaque olmadan istanbul yazarsak bulamıyacaktır, çünkü veriler büyük harfledir #
    )
        ->getCounty("ADALAR") # ->getCounty(0) # İlçeyi getiriyoruz.
        ->getTown(FIRST) # İlk semt'i alıyoruz.
        ->getVillage(FIRST); # İlk mahalleyi seçiyoruz.

echo $Adres->getZipCode();
```
## ☑️ To-Do
- [ ] `isCity`, `isCounty` gibi kontrol etmek için fonksiyonlar.

## Lisans
MIT