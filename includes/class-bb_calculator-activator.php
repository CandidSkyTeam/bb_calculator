<?php

/**
 * Fired during plugin activation
 *
 * @link       https://candidsky.com
 * @since      1.0.0
 *
 * @package    Bb_calculator
 * @subpackage Bb_calculator/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Bb_calculator
 * @subpackage Bb_calculator/includes
 * @author     Deividas Ambrazevicius(Candidsky) <deividas@candidsky.com>
 */
class Bb_calculator_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {


        global $wpdb;

        $table_name = $wpdb->prefix . 'options';

        $wpdb->insert(
            $table_name,
            array(
                'option_name' => 'bb_data',
                'option_value' =>'',
                'autoload' => 'yes',
            )
        );

        $data = array (
            2 =>
                array (
                    'department' => 'coming-in',
                    'title' => 'Wages/salary (after tax)',
                    'short_info' => 'How to negotiate a pay rise',
                    'long_info' => 'Negotiating a payrise can be seriously stressful. But there are some proven techniques that may make it easier than you think.',
                    'url' => '',
                ),
            1 =>
                array (
                    'department' => 'coming-in',
                    'title' => 'Interest or dividends from savings and investments',
                    'short_info' => 'Make money by switching your bank account',
                    'long_info' => 'The banking sectory is fiercly competitive. So much so that they\'ll pay you hundreds just to switch provider!',
                    'url' => '',
                ),
            3 =>
                array (
                    'department' => 'coming-in',
                    'title' => 'Pension',
                    'short_info' => 'Maximising pension payments',
                    'long_info' => 'Don\'t miss out on what\'s rightly yours. Ensure you\'re claiming your full pension entitlements.',
                    'url' => '',
                ),
            4 =>
                array (
                    'department' => 'coming-in',
                    'title' => 'Child benefit',
                    'short_info' => 'Check your child benefit eligibility',
                    'long_info' => 'You may be able to claim child benefit for longer than you think. So make sure you know what you\'re entitled to claim for your dependent children.',
                    'url' => '',
                ),
            5 =>
                array (
                    'department' => 'coming-in',
                    'title' => 'Child tax credit',
                    'short_info' => 'Who can get child tax credit',
                    'long_info' => 'Are you claiming child tax credit as well as child benefit? Find out if you could potentially boost your income by checking your eligibility.',
                    'url' => '',
                ),
            6 =>
                array (
                    'department' => 'coming-in',
                    'title' => 'Universal credit',
                    'short_info' => 'Check your universal tax credit eligibility',
                    'long_info' => 'Universal credit is aimed at those out of work or on a low income - but you may be entitled to more than you think, depending on where you live and your circumstances.',
                    'url' => '',
                ),
            7 =>
                array (
                    'department' => 'coming-in',
                    'title' => 'Housing benefit',
                    'short_info' => 'Find out if you can claim housing benefit',
                    'long_info' => 'If you claim certain benefits, you may also be entitled to housing benefit payments.',
                    'url' => '',
                ),
            8 =>
                array (
                    'department' => 'coming-in',
                    'title' => 'Benefits (eg child benefit, child tax credits and income support)',
                    'short_info' => 'Ensure you\'re claiming the right benefits',
                    'long_info' => 'Check your eligibility for benefits and make sure you\'re claiming what you\'re entitled to.',
                    'url' => '',
                ),
            10 =>
                array (
                    'department' => 'coming-in',
                    'title' => 'Jobseeker\'s allowance',
                    'short_info' => 'Are you eligible for jobseeker\'s allowance?',
                    'long_info' => 'If you\'re looking for work, you may be able to claim jobseeker\'s allowance. But how much and when you can claim depends on a number of factors.',
                    'url' => '',
                ),
            11 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Rent/board/mortgage',
                    'short_info' => 'How to save on rent',
                    'long_info' => 'Don\'t spend more than 25% of your income on rent. Here\'s how to put more money in your pocket and less in your landlord\'s.',
                    'url' => '',
                ),
            12 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Electricty bills',
                    'short_info' => 'Save £300 a year on your power bills',
                    'long_info' => 'Power companies want your custom. So it may be easier than you think to get a better deal by switching provider.',
                    'url' => '',
                ),
            13 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Gas bills',
                    'short_info' => 'Dual fuel may be more expensive than separate bills',
                    'long_info' => 'Dual fuel or separate bills - which is cheaper? The answer might surprise you...',
                    'url' => '',
                ),
            14 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Water bills',
                    'short_info' => 'Cut your water bills',
                    'long_info' => 'Running water and flushing toilets are pretty essential. But there are tricks to reduce the amount you pay for it.',
                    'url' => '',
                ),
            15 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Council tax',
                    'short_info' => 'Pay less council tax',
                    'long_info' => 'Exemptions, rebates, reductions - you may be entitled to a host of savings in your council tax bill',
                    'url' => '',
                ),
            16 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Home/contents insurance',
                    'short_info' => 'Do you need contents insurance?',
                    'long_info' => 'Do you need contents insurance? And are you getting a good deal. Finding out could save a stack of cash.',
                    'url' => '',
                ),
            17 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Debt repayments',
                    'short_info' => 'Consolidate your debts and save',
                    'long_info' => 'Roll all your debts into a single payment. It\'s easy to manage and could save you hundreds in fees and interest.',
                    'url' => '',
                ),
            18 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Eating out',
                    'short_info' => 'Save on dining out with these coupons',
                    'long_info' => 'We should all probably cook at home more often. But when that\'s not possible, there are tonnes of restaurant and takeaway deals to keep your costs down.',
                    'url' => '',
                ),
            19 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Childcare',
                    'short_info' => 'Help paying for childcare',
                    'long_info' => 'Get help paying for childcare from the government.',
                    'url' => '',
                ),
            20 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Food shopping',
                    'short_info' => 'Save £1,500 on groceries with the Down Shift Challenge',
                    'long_info' => 'Still buying big brands at the supermarket? Choose cheaper labels and save a packet on your weekly shop.',
                    'url' => '',
                ),
            21 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Car insurance',
                    'short_info' => '15 tips for cheaper car insurance',
                    'long_info' => 'Shopping around for a better deal is just one of many ways to save hundreds on your car insurance.',
                    'url' => '',
                ),
            22 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Car maintenance',
                    'short_info' => 'How to minimise car maintenance',
                    'long_info' => 'Services and repairs can cost a fortune - especially on old cars. Here\'s how to reduce wear-and-tear and spread payments of costly maintenance.',
                    'url' => '',
                ),
            23 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Roadside assist',
                    'short_info' => 'Cheaper breakdown cover from just £28 per year',
                    'long_info' => 'Negotiating your breakdown cover renewal has a surpisingly high success rate. Call your provider and follow these steps for a better deal.',
                    'url' => '',
                ),
            24 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Vehicle tax',
                    'short_info' => 'Best cars with no road tax',
                    'long_info' => 'Is it time to save on fuel and tax with a more efficient car?',
                    'url' => '',
                ),
            25 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Hire purchase payments',
                    'short_info' => 'Consolidate your HP payments',
                    'long_info' => 'Combining your hire purchase payments with other bills could put more money back into your monthly kitty.',
                    'url' => '',
                ),
            26 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Fuel costs',
                    'short_info' => 'Save on fuel with these tips',
                    'long_info' => 'Run your car more efficiently and you could save hundreds a year in petrol costs.',
                    'url' => '',
                ),
            27 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Alcohol and tobacco',
                    'short_info' => 'How much can you save save by quitting smoking?',
                    'long_info' => 'Drinking and smoking is expensive. If quitting\'s proving difficult, cutting down will save your health and your wallet.',
                    'url' => '',
                ),
            28 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Credit card payments',
                    'short_info' => 'How to reduce your credit card payments',
                    'long_info' => 'Reduce your credit card payments, including consolidating with other debts into a single payment.',
                    'url' => '',
                ),
            29 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Pets',
                    'short_info' => 'Easy ways to save on pet costs',
                    'long_info' => 'Your best buddy\'s worth the money. But there are some great tips and tricks to save on pet food and insurance.',
                    'url' => '',
                ),
            30 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Coffee and snacks at work',
                    'short_info' => 'Your daily coffee for £1 or less',
                    'long_info' => 'No need to give up your daily coffee - get it for half price or cheaper!',
                    'url' => '',
                ),
            31 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Holiday',
                    'short_info' => 'Get a holiday loan',
                    'long_info' => 'Don\'t sacrifice your two weeks in the sun. Spread the cost with a holiday loan.',
                    'url' => '',
                ),
            32 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Travel to work',
                    'short_info' => 'Get your boss to pay for your train ticket',
                    'long_info' => 'Commuting by train? You can save a fortune by getting your boss to pay for it. Yes, really!',
                    'url' => '',
                ),
            33 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Other costs',
                    'short_info' => '48 things we all forget to budget for',
                    'long_info' => 'Haircuts, school supplies, pet licences - remember to include those easy-to-forget expenses in your budget',
                    'url' => '',
                ),
            34 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Mobile phone',
                    'short_info' => 'The secrets to cheaper phones - and cheaper contracts',
                    'long_info' => 'Shopping around and comparing the cost of plans can help cut the price of your phone, and your contract.',
                    'url' => '',
                ),
            35 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Phone insurance',
                    'short_info' => 'Better value phone insurance',
                    'long_info' => 'Are you paying your phone insurance to your mobile provider? Get it with your bank and save!',
                    'url' => '',
                ),
            36 =>
                array (
                    'department' => 'going-out',
                    'title' => 'Internet and home phone',
                    'short_info' => 'Cheaper broadband deals',
                    'long_info' => 'Switching your internet provider could mean a better deal on broadband.',
                    'url' => '',
                ),
        );



        update_option('bb_data', $data);


	}

}
