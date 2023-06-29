<?php

namespace App\Form;

use App\Entity\Reservation;
use Doctrine\DBAL\Types\DateType;
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
            ->add('attendance_date')
            ->add('status');

        $freeSeats = [];

        $entityManager = $options['entityManager'];

        $availableSeats = $options['availableSeats'];

        foreach ($availableSeats as $availableSeat) {
            $freeSeats[$availableSeat->getSeatNumber()] = $availableSeat->getSeatNumber();
        }

        $builder->add('first_seat_number', ChoiceType::class, [
            'choices' => $freeSeats,
            'required' => true,
        ]);

        $builder->add('last_seat_number', ChoiceType::class, [
            'choices' => $freeSeats,
            'required' => true,
        ]);

        $schedules = [
            'Evening Schedule (18:00)' => 'Evening Schedule (18:00)',
            'Night Schedule (21:00)' => 'Night Schedule (21:00)',
        ];

        $builder->add('schedule', ChoiceType::class, [
            'choices'  => $schedules,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
            'csrf_protection' => false,
        ]);

        $resolver->setRequired('entityManager');
        $resolver->setRequired('availableSeats');
    }
}
