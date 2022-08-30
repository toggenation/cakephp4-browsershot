<?php

/**
 * @var \App\View\AppView $this
 */
$faker = Faker\Factory::create('en_AU');

$faker->addProvider(new Bezhanov\Faker\Provider\Commerce($faker));

$this->Html->css('bootstrap.min', ['block' => true]);
?>

<div class="row">
    <div class="col">
        <div class="text-wrap">
            <p class="fs-3">TAX INVOICE <strong>INV-<?= $faker->randomNumber(6); ?></strong></p>
            <strong><?= $faker->company(); ?></strong><br>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg>

            <?= $faker->address(); ?><br>

            @
            <?= $faker->word() . '@example.com.au'; ?><br>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
            </svg>
            <?= $faker->numerify('04## ### YYY'); ?>
        </div>
    </div>
    <div class="col-4">
        <?=
        $this->Html->image('logo.png', [
            'fullBase' => true,
            'height' => '150px',
            'class' => 'img float-end'
        ]);
        ?>
    </div>
</div>
<div class="row mt-4">
    <div class="col">
        <div class="border rounded border-dark h-100 p-2 me-3">
            Notes:<br>
            Deliver to back unit of factory
        </div>

    </div>
    <div class="col-5 float-end">
        <strong>Ship to:</strong><br>
        <strong><?= $faker->company(); ?></strong><br>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
        </svg>
        <?= $faker->address(); ?><br>
        @ <?= $faker->word() . '@otherexample.com.au'; ?><br>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
            <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
        </svg>
        <?= $faker->numerify('04## ### XXX'); ?>
    </div>
</div>

<table class="mt-5 table table-sm table-bordered">
    <thead>
        <tr>
            <th>Line</th>
            <th>Description</th>
            <th class="text-center">Quantity</th>
            <th class="text-end">Price</th>
            <th class="text-end">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $grandTotal = 0; ?>
        <?php for ($i = 1; $i < 6; $i++) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $faker->productName; ?></td>
                <td class="text-center">
                    <?php $qty = $faker->numberBetween(1, 9);
                    $price = $faker->randomNumber(2);
                    $lineTotal = $price * $qty;
                    $grandTotal += $lineTotal;
                    ?>
                    <?= $qty; ?></td>
                <td class="text-end"><?= $this->Number->currency($price); ?></td>
                <td class="text-end"><?= $this->Number->currency($lineTotal); ?></td>
            </tr>
        <?php endfor; ?>
        <tr>

            <td colspan="5">&nbsp;
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <th class="text-end fw-bold">Tax</th>
            <th class="text-end">$1,000,000</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <th class="text-end"><?= $this->Number->currency($grandTotal); ?></th>
        </tr>
    </tbody>
</table>