<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('customer_name')
            ->add('created_at')
            ->add('updated_at')
            ->add('first_seat_number')
            ->add('last_seat_number')
            ->add('price')
            ->add('status');

        $seatLetters = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
        $seatNumbers = range(1, 20);

        $seats = [];

        foreach ($seatLetters as $seatLetter) {
            foreach ($seatNumbers as $seatNumber) {
                $seats["{$seatLetter} - {$seatNumber}"] = "{$seatLetter} - {$seatNumber}";
            }
        }

        $builder->add('first_seat_number', ChoiceType::class, [
            'choices'  => $seats,
        ]);

        $builder->add('last_seat_number', ChoiceType::class, [
            'choices'  => $seats,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
            'csrf_protection' => false,
        ]);
    }
}
