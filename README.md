Exam order
==========

Small soft use to randomly generate an exam order.

## Usage

### Get your seed
Generate a seed for your exam:

```
php seed-generator.php
```

You will get something like that:
```
Random seed generated: 522fdeba88b7715d428e
```

The seed is used to replay the order generation to get the same result.

### Get your exam order

```
php get-order.php [numberOfGroups] [seed]
```

Example
```
php get-order.php 10 522fdeba88b7715d428e
```

You will get something like that:
```
Groups order:
Group n°3
Group n°5
Group n°8
Group n°1
Group n°10
Group n°9
Group n°4
Group n°6
Group n°2
Group n°7
```


## License

MIT
