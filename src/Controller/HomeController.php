<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Model\ContactMessage;
use App\Repository\ProjectRepository;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        Request $request,
        ProjectRepository $projectRepository,
        SkillRepository $skillRepository
    ): Response {
        $contactMessage = new ContactMessage();
        $contactForm = $this->createForm(ContactType::class, $contactMessage);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $this->addFlash('success', 'Thanks for reaching out. I will get back to you soon.');

            $to = 'tadiaemekson@gmail.com';
            $subject = sprintf('Portfolio contact from %s', (string) $contactMessage->getName());
            $body = implode("\n", [
                'You received a new message from your portfolio contact form:',
                '',
                'Name: ' . (string) $contactMessage->getName(),
                'Email: ' . (string) $contactMessage->getEmail(),
                '',
                'Message:',
                (string) $contactMessage->getMessage(),
            ]);

            $mailtoUrl = 'mailto:' . $to
                . '?subject=' . rawurlencode($subject)
                . '&body=' . rawurlencode($body);

            $this->addFlash('mailto_url', $mailtoUrl);

            return new RedirectResponse($this->generateUrl('app_home') . '#contact');
        }

        return $this->render('home/index.html.twig', [
            'projects' => $projectRepository->findAll(),
            'skills'   => $skillRepository->findAll(),
            'contactForm' => $contactForm->createView(),
        ]);
    }
}