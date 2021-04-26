# Templating with Latte in CakePop

## Imports / Use / Namespaced classes

Using namespaces can be done. We assign the use class to a variable.

```php
// So instead of this,
use App\Helpers\Path;
echo Path::root();
// we do this.
{var $Path = App\Helpers\Path::class}
{$Path::root()}
```
