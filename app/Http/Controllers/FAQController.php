<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = [
            ['question' => 'What services does Rising Aluminium Works provide?', 'answer' => 'We specialize in aluminium fabrication, including windows, doors, partitions, and custom aluminium structures.'],
            ['question' => 'Do you offer customized aluminium designs?', 'answer' => 'Yes, we provide fully customized aluminium solutions based on your requirements.'],
            ['question' => 'Can I request a free quotation?', 'answer' => 'Yes, you can request a free quotation by providing your project details through our website or by contacting us directly.'],
            ['question' =>'Where is your company located?', 'answer' => 'Our workshop is located in Gweru, and we serve customers across windows, doors, sheets etc.'],
            ['question' => 'What are the benefits of aluminium over other materials?', 'answer' => 'Aluminium is lightweight, durable, rust-resistant, and provides a modern aesthetic for homes and businesses.'],
            ['question' => 'What types of aluminium doors and windows do you manufacture?', 'answer' => 'We offer sliding, casement, folding, and fixed aluminium doors and windows in various designs.'],
            ['question' => 'How long does it take to complete an order?', 'answer' => 'The timeline depends on the project size and complexity, but we provide an estimated delivery schedule upon order confirmation.'],
            ['question' => 'Do you offer installation services?', 'answer' => 'Yes, we provide professional installation services for all our aluminium products.'],
            ['question' => 'How do I get a price estimate for my project?', 'answer' => 'You can request a quotation by submitting your project details via our website or visiting our office.'],
            ['question' => 'What payment methods do you accept?', 'answer' => 'We accept cash, bank transfers, and online payments.'],
            ['question' => 'Do you provide a warranty for your products?', 'answer' => 'Yes, we offer a warranty on manufacturing defects and workmanship. The duration varies based on the product.'],
            ['question' => 'What should I do if I face an issue with my aluminium installation?', 'answer' => 'You can contact our support team, and we will assess and resolve the issue as soon as possible.'],
            // Add more FAQs here...
        ];

        return view('faq', compact('faqs'));
}
}