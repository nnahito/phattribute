# Phattribute
PHPのAttributeを使って色々出来ないかなーと思っているプロジェクト。  
Javaのlombokみたいな感じで利用できたらいいなぁ

## sample
**Model的ななにか**
```php
class UserTel
{
    use Phattribute;

    #[Tel]
    private string $tel;

    #[Tel('hyphen')]
    private string $telHyphen;

    #[Tel('no-hyphen')]
    private string $telNoHyphen;
}
```

**Modelの呼び出しもと**

```php
$userTel = new UserTel();

// 「#[Tel]」はハイフンの有り無し、どちらでもOK
$userTel->tel = '03-1111-2222';    // OK
$userTel->tel = '0311112222';      // OK

// 「#[Tel('hyphen')]」はハイフンの有りのみOK
$userTel->telHyphen = '03-1111-2222';    // OK
$userTel->telHyphen = '0311112222';      // NG

// 「#[Tel('no-hyphen')]」はハイフンの無しのみOK
$userTel->telNoHyphen = '03-1111-2222';    // NG
$userTel->telNoHyphen = '0311112222';      // OK
```
