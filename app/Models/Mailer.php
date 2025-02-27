<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require ROOTPATH. 'vendor/autoload.php';

class Mailer {

	private $mailer;

    private $emailDomain;

	private $view;
	private $ccMailAddress = '';
	private $templateBody = '';

	const EMAIL_HOST = "smtp.zoho.com";
	const COMPANY_URL = '';
	const COMPANY_NAME = 'Nacos-ui Electoral';
	const COMPANY_SUPPORT = '';
	const COMPANY_EMAIL = "holynationdevelopment@zoho.com";
	const SENDER_USERNAME = "holynationdevelopment@zohomail.com";

    /**
     * @throws Exception
     */
    public function __construct() {
		$this->view = Services::renderer();
        $this->emailDomain = self::SENDER_USERNAME;

        $this->mailer = new PHPMailer(true);
        $this->mailer->SMTPDebug = SMTP::DEBUG_OFF;
        $this->mailer->isSMTP();
        $this->mailer->CharSet = "utf-8";
        $this->mailer->Host = 'smtp.zoho.com';
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = self::SENDER_USERNAME;
        $this->mailer->Password = 'Since_Feb_2015';
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mailer->Port = 465;
        $this->mailer->isHTML(true);
        $this->mailer->setFrom(self::SENDER_USERNAME, self::COMPANY_NAME);
	}

	public function setTemplateBody(string $name): void {
		$this->templateBody = $name;
	}

	public function getTemplateBody(): string {
		return $this->templateBody;
	}

	/**
	 * @param array     $data
	 * @param string    $page
	 * @return string \App\Views\{page}
	 */
	public function mailTemplateRender(array $data, string $page) {
		$this->view->setData($data);
		$page = $page . '.php';
		$templateMsg = $this->view->render('emails/' . $page);
		$this->setTemplateBody($templateMsg);
		return $templateMsg;
	}

    /**
     * This is the main func that send the mail to the client
     * @param string|null $recipient [description]
     * @param string|null $subject [description]
     * @param string|null $message [description]
     * @return bool
     * @throws Exception
     */
	private function mailerSend(string $recipient = null, string $subject = null, string $message = null): bool {
		$this->mailer->addAddress($recipient);

		$this->mailer->Subject = $subject;
		$this->mailer->Body = $message;
		if ($this->mailer->send()) {
            $this->mailer->clearAddresses();
			return true;
		} else {
			echo 'Mailer Error: ' . $this->mailer->ErrorInfo;
            $this->mailer->clearAddresses();
			return false;
		}
	}

	/**
	 * This is to get the subject mail
	 * @param  string $type [description]
	 * @return string	 */
	private function mailSubject(string $type): string {
		$result = array(
			'verify_account' => 'Nacos Electoral Mock Voting',
		);
		return $result[$type];
	}

    /**
     * This is function to send mail out to client
     * @param string $recipient [description]
     * @param string $subject [description]
     * @param int|null $type [description]
     * @param string|null $customer [description]
     * @param array|null $info [description]
     * @return bool
     */
	public function sendCustomerMail(string $recipient, string $subject, int $type = null, string $customer = null, array $info = null): bool {
		// it property templateBody take precedence over the mailBody method
		if ($this->templateBody != '') {
			$message = $this->templateBody;
		} else {
			$message = $this->formatMsg($recipient, $type, $customer, $info);
		}
		$recipient = trim($recipient);
		$subject = $this->mailSubject($subject);

		if (!$this->mailerSend($recipient, $subject, $message)) {
			return false;
		}
		return true;
	}
	/**
	 * @param mixed $recipient
	 * @param mixed $type
	 * @param mixed $customer
	 * @param mixed $info
	 * @return string
	 */
	private function formatMsg($recipient = '', $type = null, $customer = null, $info = null): string {
		if ($recipient) {
			$msg = '';
			return $msg;
		}
	}

    /**
     * @throws Exception
     */
    public function sendBulkMail($voters, $data){
        $mailer = $this->mailer;
        $mailer->Subject = $this->mailSubject('verify_account');
        $mailer->setFrom(self::SENDER_USERNAME, self::COMPANY_NAME);

        $this->view->setData($data);
        $page = 'vote.php';
        $templateMsg = $this->view->render('emails/' . $page);
        $content = $templateMsg;

        $mailer->Body = $content;

        $error = '';
        foreach ($voters as $voter) {
            try{
                $mailer->addAddress($voter['email']);
                $mailer->send();
            }catch (\Exception $e){
                $message = 'Nacos::Mailer -> ' . $mailer->ErrorInfo;
                $error .= $voter['email'] . ', ';
                log_message('error', $message .' '. $error );
                $mailer->getSMTPInstance()->reset();
            }

            $mailer->clearAddresses();
        }

        return true;
    }
}
